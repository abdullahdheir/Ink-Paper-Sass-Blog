<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function feed()
    {
        $query = Article::withoutGlobalScope('owned_by_auth')->published()->with('category', 'tags')->latest();
        $articles = $query->paginate(10);
        $trending_tags = Tag::with('reach')->whereHas('reach', function ($query) {
            $query->where('status', 'trending');
        })->take(5)->get();
        $popular_articles = $query->take(3)->get();
        return view('public.feed', compact('articles', 'trending_tags', 'popular_articles'));
    }


    public function search(Request $request)
    {
        $query = trim($request->query('q', ''));
        $type = in_array($request->query('type', 'all'), ['all', 'articles', 'authors', 'tags']) ? $request->query('type', 'all') : 'all';

        $articleQuery = Article::published()->with(['author.profile', 'category']);
        $authorQuery = User::authors()->active()->with(['profile', 'stats'])->withCount(['publishedArticles']);
        $tagQuery = Tag::withCount('articles');

        if ($query !== '') {
            $articleQuery->search($query);

            $authorQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%{$query}%")
                    ->orWhere('username', 'like', "%{$query}%")
                    ->orWhereHas('profile', fn($profile) => $profile->where('bio', 'like', "%{$query}%"));
            });

            $tagQuery->where('name', 'like', "%{$query}%");
        }

        $articleResults = $articleQuery->latest()
            ->paginate(8, ['*'], 'page_articles')
            ->appends(['q' => $query, 'type' => $type]);

        $authorResults = $authorQuery->latest()
            ->paginate(8, ['*'], 'page_authors')
            ->appends(['q' => $query, 'type' => $type]);

        $tagResults = $tagQuery->latest()
            ->paginate(12, ['*'], 'page_tags')
            ->appends(['q' => $query, 'type' => $type]);

        return view('public.search-results', compact('query', 'type', 'articleResults', 'authorResults', 'tagResults'));
    }
}
