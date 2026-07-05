<?php

namespace App\Listeners;

use App\Events\ArticlePublished;
use App\Models\User;
use App\Notifications\ArticlePublishedNotification;

class SendArticlePublishedNotification
{

    public function handle(ArticlePublished $event): void
    {
        // Notify followers of the article author
        $event->article->author->followers->each(
            fn($follower) => $follower->notify(new ArticlePublishedNotification($event->article))
        );
    }
}
