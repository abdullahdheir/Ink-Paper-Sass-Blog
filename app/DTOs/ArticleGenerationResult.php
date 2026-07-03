<?php

namespace App\DTOs;

class ArticleGenerationResult
{
    public function __construct(
        public readonly string $content,
        public readonly string $summary,
        public readonly string $seoTitle,
        public readonly string $seoDescription,
        public readonly array|string $seoKeywords,
        public readonly string $slug,
        public readonly array  $suggestedTags,
        public readonly int    $readingTime,
        public readonly int    $wordCount,
    ) {}

    public static function fromArray(array $data): self
    {
        $wordCount = str_word_count(strip_tags($data['content'] ?? ''));

        return new self(
            content: $data['content']        ?? '',
            summary: $data['summary']        ?? '',
            seoTitle: $data['seo_title']      ?? '',
            seoDescription: $data['seo_description'] ?? '',
            seoKeywords: $data['seo_keywords'] ?? [],
            slug: $data['slug']           ?? '',
            suggestedTags: $data['suggested_tags'] ?? [],
            readingTime: (int) ceil($wordCount / 200),
            wordCount: $wordCount,
        );
    }

    public function toArray(): array
    {
        return [
            'content'         => $this->content,
            'summary'         => $this->summary,
            'seo_title'       => $this->seoTitle,
            'seo_description' => $this->seoDescription,
            'seo_keywords'    => is_array($this->seoKeywords) ? implode(',', $this->seoKeywords)  : $this->seoKeywords,
            'slug'            => $this->slug,
            'suggested_tags'  => $this->suggestedTags,
            'reading_time'    => $this->readingTime,
            'word_count'      => $this->wordCount,
        ];
    }
}
