<?php

namespace App\Listeners;

use App\Events\AuthorViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cookie;

class IncrementAuthorViews
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
    public function handle(AuthorViewed $event): void
    {
        $author = $event->author;
        $authors = Cookie::get('viewed_authors', []);
        $authors = is_array($authors) ? $authors : unserialize($authors);

        if (in_array($author->id, $authors)) {
            return; // Author already viewed in this session, do not increment
        }
        $author->stats()->increment('total_views');
        $authors[] = $author->id;

        Cookie::queue('viewed_authors', serialize($authors), 60 * 24); // Store the cookie for 1 day
    }
}
