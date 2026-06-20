<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['user_id', 'article_id', 'parent_id', 'body', 'likes_count', 'is_approved'])]
class Comment extends Model
{
    /** use HasFactory<CommentFactory> */
    use HasFactory, SoftDeletes;

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function replies()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
