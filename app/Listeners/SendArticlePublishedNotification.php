<?php

namespace App\Listeners;

use App\Events\ArticlePublished;
use App\Models\User;
use App\Notifications\ArticlePublishedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticlePublishedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ArticlePublished $event): void
    {
        // Notify followers of the article author
        $followers = User::whereIn('id', $event->article->author->followers()->pluck('user_id'))->get();

        foreach ($followers as $follower) {
            $follower->notify(new ArticlePublishedNotification($event->article));
        }
    }
}
