<?php

namespace App\Observers;

use App\Enums\ArticleStatus;
use App\Models\Article;

class ArticleObserver
{
    /**
     * Handle the Article "createing" event.
     */
    public function creating(Article $article): void
    {
        $article->slug         = $article->slug ?? Article::generateSlug($article->title);
        $article->reading_time = Article::estimateReadingTime($article->content);
        $article->published_at = $article->status === ArticleStatus::PUBLISHED ? now() : null;
    }

    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        if ($article->status === ArticleStatus::PUBLISHED) {
            $article->author()->stats()->increment('articles_count');
        }
    }

    /**
     * Handle the Article "updating" event.
     */
    public function updating(Article $article): void
    {
        if ($article->isDirty('content')) {
            $article->reading_time = Article::estimateReadingTime($article->content);
        }
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        if ($article->isDirty('status')) {
            if ($article->status === ArticleStatus::PUBLISHED) {
                $article->author()->stats()->increment('articles_count');
            }

            if ($article->getOriginal('status') === ArticleStatus::PUBLISHED && $article->status !== ArticleStatus::PUBLISHED) {
                $article->author()->stats()->decrement('articles_count');
            }
        }
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        $article->author()->stats()->decrement('articles_count');
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        $article->author()->stats()->increment('articles_count');
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        if (! $article->trashed()) {
            $article->author()->stats()->decrement('articles_count');
        }
    }
}
