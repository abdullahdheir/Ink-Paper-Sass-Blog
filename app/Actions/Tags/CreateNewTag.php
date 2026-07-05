<?php

namespace App\Actions\Tags;

use App\Enums\TagStatus;
use App\Models\Tag;
use App\Models\TagReach;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateNewTag
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $newTag = Tag::create([
                'name' => $data['name'],
                'slug' => $data['slug'] ?? Str::slug($data['name']),
            ]);

            // Create tag reach record
            TagReach::create([
                'tag_id' => $newTag->id,
                'total_views' => 0,
                'status' => TagStatus::ACTIVE,
            ]);

            return $newTag;
        });
    }
}
