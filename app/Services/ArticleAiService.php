<?php

namespace App\Services;

use App\Ai\Agents\ArticleWriterAgent;
use App\DTOs\ArticleGenerationResult;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Enums\Lab;

class ArticleAiService
{
    // ─────────────────────────────────────────────────────────────────────────
    // Generate full article content
    // ─────────────────────────────────────────────────────────────────────────

    public function generateContent(string $title): ArticleGenerationResult
    {
        $keywords = $this->extractKeywords($title);

        try {
            $prompt = ArticleWriterAgent::buildArticlePrompt($title, $keywords);

            $res = ArticleWriterAgent::make(type: 'content')
                ->prompt($prompt, provider: Lab::Groq);

            // Normalize different possible response shapes coming from the agent:
            // - structured array (already parsed)
            // - object with `text` property containing JSON
            // - raw JSON string
            if (is_array($res)) {
                $raw = $res;
            } elseif (is_object($res) && property_exists($res, 'text')) {
                $raw = json_decode($res->text, true) ?? [];
            } elseif (is_string($res)) {
                $raw = json_decode($res, true) ?? [];
            } else {
                $raw = [];
            }

            $raw['content'] = $this->cleanHtml($raw['content'] ?? '');

            return ArticleGenerationResult::fromArray($raw);
        } catch (\Throwable $e) {
            Log::error('ArticleAiService::generateArticle failed', [
                'title' => $title,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Generate summary only
    // ─────────────────────────────────────────────────────────────────────────

    public function generateSummary(string $title, string $contentPreview = ''): string
    {
        try {
            $prompt = ArticleWriterAgent::buildSummaryPrompt($title, $contentPreview);

            /** @var array $result */
            $result = ArticleWriterAgent::make(type: 'summary')
                ->prompt($prompt, provider: Lab::Groq);

            return $result['summary'] ?? '';
        } catch (\Throwable $e) {
            Log::error('ArticleAiService::generateSummary failed', [
                'title' => $title,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Helpers
    // ─────────────────────────────────────────────────────────────────────────

    private function extractKeywords(string $title): array
    {
        $stopWords = [
            'the',
            'and',
            'for',
            'are',
            'but',
            'not',
            'you',
            'all',
            'can',
            'was',
            'one',
            'our',
            'out',
            'get',
            'has',
            'how',
            'new',
            'now',
            'see',
            'two',
            'way',
            'who',
            'did',
            'its',
            'let',
            'put',
            'say',
            'she',
            'too',
            'use',
            'with',
            'from',
            'this',
            'that',
            'will',
            'your',
            'have',
            'more',
            'when',
            'what',
            'into',
            'over',
            'also',
            'been',
            'they',
            'were',
            'said',
            'each',
            'which',
            'their'
        ];

        return collect(explode(' ', strtolower($title)))
            ->map(fn($w) => preg_replace('/[^a-z0-9]/', '', $w))
            ->filter(fn($w) => strlen($w) > 3 && !in_array($w, $stopWords))
            ->unique()
            ->values()
            ->take(5)
            ->toArray();
    }

    private function cleanHtml(string $html): string
    {
        // Remove empty Quill paragraphs
        $html = preg_replace('/<p>\s*<br\s*\/?>\s*<\/p>/i', '', $html);
        $html = preg_replace('/<p>\s*<\/p>/i', '', $html);

        // Convert leftover markdown bold to HTML
        $html = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $html);

        // Remove leftover markdown headers
        $html = preg_replace('/^#{1,6}\s+(.+)$/m', '$1', $html);

        return trim($html);
    }
}
