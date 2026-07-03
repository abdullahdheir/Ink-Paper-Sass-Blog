<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $articles = Article::ownedByAuth()->latest()->paginate(5);

        return view('dashboard.index', compact('articles'));
    }

    public function analytics()
    {
        return view('dashboard.analytics');
    }

    public function drafts()
    {
        $articles = Article::ownedByAuth()->drafts()->latest()->paginate(5);
        return view('dashboard.drafts', compact('articles'));
    }
}
