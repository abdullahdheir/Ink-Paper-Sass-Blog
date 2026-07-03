<?php

namespace App\Ai\Agents;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Str;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Promptable;
use Stringable;

class ArticleWriterAgent implements Agent, HasStructuredOutput
{
    use Promptable;

    public function __construct(
        private readonly string $type = 'content', // 'content' | 'summary'
    ) {}

    // ─────────────────────────────────────────────────────────────────────────
    // Instructions (System Prompt)
    // ─────────────────────────────────────────────────────────────────────────

    public function instructions(): Stringable|string
    {
        if ($this->type === 'summary') {
            return 'You are an expert SEO copywriter for "Ink & Paper" platform. '
                . 'Return structured JSON only. No explanations, no markdown, no extra text.';
        }

        return 'You are a senior SEO content strategist and professional writer for "Ink & Paper", '
            . 'a premium publishing platform trusted by 50,000+ readers. '
            . 'Produce high-quality, SEO-optimized articles following E-E-A-T principles. '
            . 'Return structured JSON only. No markdown code blocks, no extra text outside JSON.';
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Structured Output Schema
    // ─────────────────────────────────────────────────────────────────────────

    public function schema(JsonSchema $schema): array
    {
        if ($this->type === 'summary') {
            return [
                'summary' => $schema->string()
                    ->description('150-160 character meta description starting with an action verb, includes primary keyword')
                    ->required(),
            ];
        }

        return [
            'content' => $schema->string()
                ->description('Full HTML article body, minimum 1000 words. Use h2, p, strong, blockquote, ul, li, img tags only. No empty paragraphs. No markdown.')
                ->required(),

            'summary' => $schema->string()
                ->description('150-160 character meta description with primary keyword and action verb')
                ->required(),

            'seo_title' => $schema->string()
                ->description('SEO title max 60 characters including primary keyword')
                ->required(),

            'seo_description' => $schema->string()
                ->description('160 character meta description with primary keyword and call to action')
                ->required(),

            'seo_keywords' => $schema->array()
                ->items($schema->string())
                ->description('Exactly 3-5 primary keywords for the article')
                ->required(),

            'slug' => $schema->string()
                ->description('URL-friendly slug in lowercase-with-hyphens format')
                ->required(),

            'suggested_tags' => $schema->array()
                ->items($schema->string())
                ->description('Exactly 5 relevant tags for the article')
                ->required(),
        ];
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Static helpers to build the prompt string (called from Service)
    // ─────────────────────────────────────────────────────────────────────────

    public static function buildArticlePrompt(string $title, array $keywords): string
    {
        $keywordStr = implode(', ', $keywords);
        $imageKw1   = urlencode($keywords[0] ?? 'article');
        $imageKw2   = urlencode($keywords[1] ?? 'knowledge');
        $slugBase   = Str::slug($title);

        return <<<PROMPT
        Write a comprehensive, SEO-optimized article.

        TITLE: "{$title}"
        PRIMARY KEYWORD: "{$title}"
        SECONDARY KEYWORDS: {$keywordStr}
        SLUG: {$slugBase}

        CONTENT HTML STRUCTURE (for the "content" field — minimum 1000 words):

        <h2>[Compelling introduction title with power word]</h2>
        [Hook: shocking statistic or provocative question]
        [2-3 paragraphs explaining what topic is, why it matters now, what reader gains]

        <img src="https://picsum.photos/seed/{$imageKw1}/1200/500" alt="[descriptive alt text about {$title}]" loading="lazy">

        <h2>[Section 1: Core Concepts — specific relevant title]</h2>
        [Deep explanation with real-world examples]
        [Use <strong> for KEY TERMS and statistics]
        [Data point with source: <a href="#sources">[Source Name]</a>]

        <h2>[Section 2: Deep Analysis — specific relevant title]</h2>
        [Explore nuances, challenges, or lesser-known aspects]
        <blockquote>"[Relevant expert quote about this topic]" — [Expert Name, Title/Organization]</blockquote>
        [2-3 paragraphs expanding on implications]

        <h2>[Section 3: Practical Application — specific relevant title]</h2>
        [How readers can apply this knowledge today]
        <img src="https://picsum.photos/seed/{$imageKw2}/1200/500" alt="[descriptive alt text for practical application]" loading="lazy">
        [Step-by-step or scenario-based explanation]

        <h2>[Section 4: Current Trends and Future Outlook]</h2>
        [What is happening now in this space]
        [Statistics with <strong>bold numbers</strong> and source references]

        <h2>Key Takeaways</h2>
        <ul>
        <li><strong>[Takeaway 1 label]:</strong> [One clear sentence explanation]</li>
        <li><strong>[Takeaway 2 label]:</strong> [One clear sentence explanation]</li>
        <li><strong>[Takeaway 3 label]:</strong> [One clear sentence explanation]</li>
        <li><strong>[Takeaway 4 label]:</strong> [One clear sentence explanation]</li>
        <li><strong>[Takeaway 5 label]:</strong> [One clear sentence explanation]</li>
        </ul>

        <h2>Conclusion</h2>
        [Synthesize main arguments in 2 paragraphs]
        [Strong call-to-action connecting back to opening hook]

        <h2>Sources and Further Reading</h2>
        <ul id="sources">
        <li><a href="#" rel="noopener">[Real organization or publication name 1]</a></li>
        <li><a href="#" rel="noopener">[Real research or study name 2]</a></li>
        <li><a href="#" rel="noopener">[Expert or authority name 3]</a></li>
        </ul>

        STRICT RULES:
        - Replace ALL [bracketed placeholders] with REAL specific content
        - NO <p><br></p> or any empty paragraphs
        - NO markdown syntax (**, ##, etc.) anywhere in the HTML
        - Minimum 1000 words in the content field
        - Every statistic must have a source reference link
        PROMPT;
    }

    public static function buildSummaryPrompt(string $title, string $contentPreview): string
    {
        return <<<PROMPT
        Write a compelling meta description for this article.

        TITLE: "{$title}"
        CONTENT PREVIEW: "{$contentPreview}"

        Requirements:
        - Exactly 150-160 characters total (count carefully before returning)
        - Start with a strong action verb (Discover, Learn, Explore, Master, etc.)
        - Include the main topic keyword naturally
        - Create curiosity or urgency for the reader
        - No quotes, plain text only, active voice, present tense
        PROMPT;
    }
}
