<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $articles = Article::publish()->latest()->limit(5)->get();

        return view('dashboard.index', compact('articles'));
    }

    public function analytics()
    {
        return view('dashboard.analytics');
    }

    public function drafts()
    {
        $articles = Article::draft()->get();
        return view('dashboard.drafts');
    }
}
