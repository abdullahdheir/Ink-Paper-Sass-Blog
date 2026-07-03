<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class CommentPostedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Comment $comment, public string $notificationType)
    {
        // $notificationType can be 'comment_posted' or 'comment_replied'
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        $article = $this->comment->article;
        $data = [
            'type' => $this->notificationType,
            'article_title' => $article->title,
            'article_slug' => $article->slug,
        ];

        if ($this->notificationType === 'comment_posted') {
            $data['commenter_name'] = $this->comment->user->name;
            $data['comment_preview'] = substr($this->comment->content, 0, 100);
        } else {
            $data['replier_name'] = $this->comment->user->name;
        }

        return $data;
    }
}
