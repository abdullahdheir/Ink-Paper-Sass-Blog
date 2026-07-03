<?php

namespace App\Services;

use App\Actions\Tags\CreateNewTag;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Tag;
use App\Models\User;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class ArticleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public  function create(array $data): Article
    {
        return DB::transaction(function () use ($data) {
            $article = Article::create($data);

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

            if (!empty($data['seo'])) {
                $seo = is_array($data['seo']) ? $data['seo'] : explode(',', $data['seo']);
                $article->seo()->create($seo);
            }

            return $article;
        });
    }

    public function update(array $data, string|int $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $article = Article::findOrFail($id);
            $article->update($data);

            if (isset($data['cover_image'])) {
                if ($data['cover_image'] instanceof UploadedFile) {
                    $article->cover_image = $data['cover_image']->store('cover_images', 'public');
                } else {

                    $article->cover_image = Storage::disk('public')->put('cover_images/' . $data['cover_image'], file_get_contents($data['cover_image']));
                }
                $article->save();
            }

            if (isset($data['tags']) && !empty($data['tags'])) {
                $tagNames = $data['tags'];
                if (!is_array($tagNames)) {
                    $tagNames = explode(',', $tagNames);
                }

                $tagIds = [];

                foreach ($tagNames as $tagName) {
                    $tagName = trim($tagName);

                    if (!$tagName) continue;

                    // Try to find existing tag by name
                    $tag = Tag::where('name', '=', $tagName)->first();

                    if ($tag) {
                        $tagIds[] = $tag->id;
                    } else {
                        // Create new tag
                        $newTag = CreateNewTag::create([
                            'name' => $tagName,
                            'description' => null,
                        ]);
                        $tagIds[] = $newTag->id;
                    }
                }

                if (!empty($tagIds)) {
                    $article->tags()->sync($tagIds);
                }
            } else {
                $article->tags()->detach();
            }

            if (isset($data['seo'])) {
                $seoData = is_array($data['seo']) ? $data['seo'] : explode(',', $data['seo']);
                if ($article->seo) {
                    $article->seo()->update($seoData);
                } else {
                    $article->seo()->create($seoData);
                }
            }

            return $article;
        });
    }

    public function like(Article $article, User $user)
    {
        try {
            $isLiked = $user->hasLiked($article);

            if ($isLiked) {
                throw new HttpException(400, 'Already liked this article.', code: 400);
            }

            $like = $article->likes()->create([
                'user_id' => $user->id,
            ]);

            $article->increment('likes_count');

            return $like;
        } catch (Throwable $err) {
            if ($err instanceof HttpException) throw $err;

            Log::error("[Like Error] - {$err->getMessage()} ", $err->getTrace());
            throw new Exception('The operation has been failed.', $err->getCode());
        }
    }

    public function unLike(Article $article, User $user)
    {
        try {
            $isLiked = $user->hasLiked($article);

            if (!$isLiked) {
                throw new HttpException(400, 'Already liked this article.', code: 400);
            }

            $like = $article->likes()->where(
                'user_id',
                '=',
                $user->id,
            )->firstOrFail();

            $delete = $like->delete();

            if ($delete) $article->decrement('likes_count');
        } catch (Throwable $err) {
            if ($err instanceof HttpException) throw $err;

            Log::error("[UnLike Error] - {$err->getMessage()} ", $err->getTrace());
            throw new Exception('The operation has been failed.', $err->getCode());
        }
    }

    public function bookmark(Article $article, User $user)
    {
        try {
            $isBookmarked = $user->hasBookmarked($article);

            if ($isBookmarked) {
                throw new HttpException(400, 'Already bookmarked this article.', code: 400);
            }

            $bookmark = $article->bookmarks()->create([
                'user_id' => $user->id,
            ]);

            $article->increment('bookmarks_count');

            return $bookmark;
        } catch (Throwable $err) {
            if ($err instanceof HttpException) throw $err;

            Log::error("[Bookmark Error] - {$err->getMessage()} ", $err->getTrace());
            throw new Exception('The operation has been failed.', $err->getCode());
        }
    }

    public function unBookmark(Article $article, User $user)
    {
        try {
            $isBookmarked = $user->hasBookmarked($article);

            if (!$isBookmarked) {
                throw new HttpException(400, 'Already bookmarked this article.', code: 400);
            }

            $bookmark = $article->bookmarks()->where(
                'user_id',
                '=',
                $user->id,
            )->firstOrFail();

            $delete = $bookmark->delete();

            if ($delete) $article->decrement('bookmarks_count');
        } catch (Throwable $err) {
            if ($err instanceof HttpException) throw $err;

            Log::error("[UnBookmark Error] - {$err->getMessage()} ", $err->getTrace());
            throw new Exception('The operation has been failed.', $err->getCode());
        }
    }

    public function autoSave(array $data, string|int $id)
    {
        $article = Article::findOrFail($id);
        $article->update($data);
        return $article;
    }
}
