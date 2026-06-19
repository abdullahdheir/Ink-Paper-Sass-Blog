<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Bookmark;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
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

    public function create() {}

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
}
