<?php

namespace App\Listeners;

use App\Events\UserFollowed;
use App\Notifications\UserFollowedNotification;

class SendUserFollowedNotification
{

    public function handle(UserFollowed $event): void
    {
        $event->followee->notify(new UserFollowedNotification($event->follower));
    }
}
