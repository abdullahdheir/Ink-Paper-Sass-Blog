<?php

namespace App\Listeners;

use App\Events\UserFollowed;
use App\Notifications\UserFollowedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserFollowedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserFollowed $event): void
    {
        $event->followee->notify(new UserFollowedNotification($event->follower));
    }
}
