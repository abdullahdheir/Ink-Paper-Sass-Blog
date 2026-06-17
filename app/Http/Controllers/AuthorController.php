<?php

namespace App\Http\Controllers;

use App\Enums\ResponseStatus;
use App\Events\AuthorViewed;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function profile(Request $request, User $author)
    {
        AuthorViewed::dispatch($author);
        $articles = Article::published()->where('user_id', '=', $author->id)->with('category', 'tags')->latest()->paginate(1)->withQueryString();
        return view('public.author-profile', compact('author', 'articles'));
    }

    public function follow(Request $request, User $author)
    {
        $isFollowing = auth()->user()->isFollowing($author);
        if ($isFollowing) {
            return $this->respondGeneral(ResponseStatus::ERROR, 400, 'Already following this author.');
        }
        auth()->user()->follow($author);
        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully followed the author.');
    }

    public function unfollow(Request $request, User $author)
    {
        $isFollowing = auth()->user()->isFollowing($author);
        if (! $isFollowing) {
            return $this->respondGeneral(ResponseStatus::ERROR, 400, 'Already unfollowing this author.');
        }
        auth()->user()->unfollow($author);
        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully unfollowed the author.');
    }
}
