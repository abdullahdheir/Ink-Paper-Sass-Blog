<?php

namespace App\Listeners;

use App\Events\ArticleViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cookie;

class IncrementArticleViews
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ArticleViewed $event): void
    {
        $article = $event->article;

        if (auth()->id() == $article->author->id) return;

        $articles = Cookie::get('viewed_articles', []);

        $articles = is_array($articles) ? $articles : unserialize($articles);

        if (in_array($article->id, $articles)) {
            return; // Article already viewed in this session, do not increment
        }

        $article->increment('views_count');

        $articles[] = $article->id;

        Cookie::queue('viewed_articles', serialize($articles), 60); // Store the cookie for 1 day
    }
}
