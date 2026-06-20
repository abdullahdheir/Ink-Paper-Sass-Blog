<?php

namespace App\Services;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;

class CommentService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(StoreCommentRequest $request)
    {
        $clean = $request->validated();

        $data = [
            'user_id' => $clean['user_id'] ?? auth()->id(),
            'article_id' => $clean['article_id'],
            'body' => $clean['body'],
            'parent_id' => $clean['comment_id'] ?? null,
        ];

        $comment = Comment::create($data);

        return $comment;
    }

    public function toggleLike(Comment $comment, User $user)
    {
        $isLiked = $user->hasLiked($comment);
        if ($isLiked) $this->unlike($comment, $user);
        else $this->like($comment, $user);
    }

    protected function like(Comment $comment, User $user)
    {
        $like = $comment->likes()->create([
            'user_id' => $user->id,
        ]);

        return $like;
    }

    protected function unlike(Comment $comment, User $user)
    {
        $like = $comment->likes()->where('user_id', '=', $user->id)->firstOrFail();
        $like->delete();
    }
}
