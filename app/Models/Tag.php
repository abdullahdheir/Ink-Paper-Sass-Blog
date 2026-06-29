<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'slug', 'color', 'articles_count'])]
class Tag extends Model
{
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }

    public function reach()
    {
        return $this->hasOne(TagReach::class, 'tag_id');
    }

    public function incrementView()
    {
        return $this->reach()->increment('total_view', 1);
    }

    public function incrementArticlesCount()
    {
        return $this->increment('articles_count');
    }

    public function decrementArticlesCount()
    {
        return $this->decrement('articles_count');
    }
}
