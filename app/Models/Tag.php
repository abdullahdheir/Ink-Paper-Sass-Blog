<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'slug', 'descrption', 'user_id'])]
class Tag extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag', 'tag_id', 'article_id')->withTimestamps();
    }

    public function reach()
    {
        return $this->hasOne(TagReach::class, 'tag_id');
    }

    public function incrementView()
    {
        return $this->reach()->increment('total_view', 1);
    }
}
