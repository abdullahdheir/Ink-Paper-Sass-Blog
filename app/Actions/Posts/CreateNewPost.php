<?php

namespace App\Actions\Posts;

use App\Actions\Tags\CreateNewTag;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateNewPost
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function create(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            $post = Post::create($data);

            if (!empty($data['cover_image'])) {
                if ($data['cover_image'] instanceof UploadedFile) {
                    $post->cover_image = $data['cover_image']->store('cover_images', 'public');
                } else {
                    $coverImagePath = Storage::disk('public')->put('cover_images/' . $data['cover_image'], file_get_contents($data['cover_image']));
                    $post->cover_image = $coverImagePath;
                }

                $post->save();
            }

            if (!empty($data['tags'])) {
                $tagNames = explode(',', $data['tags']);
                $tagIds = [];

                foreach ($tagNames as $tagName) {
                    $tagName = trim($tagName);
                    if (!$tagName) continue;

                    // Try to find existing tag by name
                    $tag = Tag::where('name', $tagName)->where('user_id', $data['user_id'])->first();

                    if ($tag) {
                        $tagIds[] = $tag->id;
                    } else {
                        // Create new tag
                        $newTag = CreateNewTag::create([
                            'name' => $tagName,
                            'user_id' => $data['user_id'],
                            'description' => null,
                        ]);

                        $tagIds[] = $newTag->id;
                    }
                }

                if (!empty($tagIds)) {
                    $post->tags()->sync($tagIds);
                }
            }

            return $post;
        });
    }
}
