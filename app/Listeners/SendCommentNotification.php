<?php

namespace App\Listeners;

use App\Events\CommentPosted;
use App\Notifications\CommentPostedNotification;

class SendCommentNotification
{

    public function handle(CommentPosted $event): void
    {
        $comment = $event->comment;
        $article = $comment->article;

        // Notify article author (if comment author is not the article author)
        if ($comment->user_id !== $article->user_id) {
            $article->author->notify(new CommentPostedNotification($comment, 'comment_posted'));
        }

        // Notify parent comment author if it's a reply
        if ($comment->parent_id) {
            $parentComment = $comment->parent;
            if ($parentComment && $comment->user_id !== $parentComment->user_id) {
                $parentComment->author->notify(new CommentPostedNotification($comment, 'comment_replied'));
            }
        }
    }
}
