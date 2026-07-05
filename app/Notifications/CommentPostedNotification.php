<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CommentPostedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Comment $comment, public string $notificationType) {}

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
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $article = $this->comment->article;
        $data = [
            'type' => $this->notificationType,
            'article_title' => $article->title,
            'article_slug' => $article->slug,
        ];

        if ($this->notificationType === 'comment_posted') {
            $data['commenter_name'] = $this->comment->author->name;
            $data['comment_preview'] = substr($this->comment->body, 0, 100);
        } else {
            $data['replier_name'] = $this->comment->author->name;
        }

        return $data;
    }
}
