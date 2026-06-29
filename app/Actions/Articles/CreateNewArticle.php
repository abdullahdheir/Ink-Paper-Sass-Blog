<?php

namespace App\Actions\Articles;

use App\Actions\Tags\CreateNewTag;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateNewArticle
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function create(array $data): Article
    {
        return DB::transaction(function () use ($data) {
            $article = Article::create([
                'category_id' => $data['category_id'] ?? null,
                'title' => $data['title'],
                'content' => $data['content'],
                'published_at' => $data['published_at'] ?? null,
                'status' => $data['status'],
                'user_id' => $data['user_id'],
            ]);

            if (!empty($data['cover_image'])) {
                if ($data['cover_image'] instanceof UploadedFile) {
                    $article->cover_image = $data['cover_image']->store('cover_images', 'public');
                } else {
                    $coverImagePath = Storage::disk('public')->put('cover_images/' . $data['cover_image'], file_get_contents($data['cover_image']));
                    $article->cover_image = $coverImagePath;
                }

                $article->save();
            }

            if (!empty($data['tags'])) {
                $tagNames = is_array($data['tags']) ? $data['tags'] : explode(',', $data['tags']);
                $tagIds = [];

                foreach ($tagNames as $tagName) {
                    $tagName = trim($tagName);
                    if (!$tagName) continue;

                    // Try to find existing tag by name
                    $tag = Tag::where('name', $tagName)->first();

                    if ($tag) {
                        $tagIds[] = $tag->id;
                    } else {
                        // Create new tag
                        $newTag = CreateNewTag::create([
                            'name' => $tagName,
                        ]);

                        $tagIds[] = $newTag->id;
                    }
                }

                if (!empty($tagIds)) {
                    $article->tags()->sync($tagIds);
                }
            }

            return $article;
        });
    }
}
