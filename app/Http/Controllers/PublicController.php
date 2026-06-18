<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function feed()
    {
        $articles = Article::with('category', 'tags')->latest()->paginate(10);
        $trending_tags = Tag::with('reach')->whereHas('reach', function ($query) {
            $query->where('status', 'trending');
        })->take(5)->get();
        $popular_articles = Article::with('category')->orderBy('created_at', 'desc')->take(3)->get();
        return view('public.feed', compact('articles', 'trending_tags', 'popular_articles'));
    }
}
