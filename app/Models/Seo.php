<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['seoable_type', 'seoable_id', 'title', 'description', 'keywords'])]
class Seo extends Model
{

    public function seoable()
    {
        return $this->morphTo();
    }
}
