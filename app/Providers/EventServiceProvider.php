<?php

namespace App\Providers;

use App\Events\ArticleLiked;
use App\Events\ArticlePublished;
use App\Events\CommentPosted;
use App\Events\UserFollowed;
use App\Listeners\SendArticleLikedNotification;
use App\Listeners\SendArticlePublishedNotification;
use App\Listeners\SendCommentNotification;
use App\Listeners\SendUserFollowedNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        ArticlePublished::class => [
            SendArticlePublishedNotification::class,
        ],
        CommentPosted::class => [
            SendCommentNotification::class,
        ],
        ArticleLiked::class => [
            SendArticleLikedNotification::class,
        ],
        UserFollowed::class => [
            SendUserFollowedNotification::class,
        ],
    ];

    /**
     * Enable event discovery.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false; // Using explicit listener mappings above
    }
}
