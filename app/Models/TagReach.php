<?php

namespace App\Models;

use App\Enums\TagStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['tag_id', 'total_view', 'status'])]
class TagReach extends Model
{
    protected $casts = [
        'status' => TagStatus::class,
    ];
    
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
