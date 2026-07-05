<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'slug', 'parent_id', 'color', 'icon', 'description', 'articles_count', 'is_active'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }
}
