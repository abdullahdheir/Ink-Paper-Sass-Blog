<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'content', 'status', 'category_id', 'user_id', 'published_at', 'cover_image'])]
class Post extends Model
{

    protected function casts()
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopePublish()
    {
        return $this->where('status','=',PostStatus::PUBLISHED->value);
    }

     public function scopeDraft()
    {
        return $this->where('status','=',PostStatus::DRAFT->value);
    }
}
