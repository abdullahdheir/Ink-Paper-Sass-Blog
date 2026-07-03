<?php

namespace App\Listeners;

use App\Events\ArticleLiked;
use App\Notifications\ArticleLikedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleLikedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ArticleLiked $event): void
    {
        // Only notify if liker is not the article author
        if ($event->user->id !== $event->article->user_id) {
            $event->article->author->notify(new ArticleLikedNotification($event->article, $event->user));
        }
    }
}
