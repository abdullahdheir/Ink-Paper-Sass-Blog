<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['title', 'slug', 'content', 'status', 'user_id', 'published_at', 'cover_image'])]
class Article extends Model
{
    protected $appends = [
        'cover_image_url',
    ];

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

    public function scopePublish(Builder $builder)
    {
        return $builder->where('status', '=', ArticleStatus::PUBLISHED->value);
    }

    public function scopeDraft(Builder $builder)
    {
        return $builder->where('status', '=', ArticleStatus::DRAFT->value);
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        return $this->cover_image ? Storage::url($this->cover_image) : null;
    }
}
