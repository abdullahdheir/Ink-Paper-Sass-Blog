<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $posts = Post::publish()->latest()->limit(5)->get();

        return view('dashboard.index',compact('posts'));
    }

    public function analytics()
    {
        return view('dashboard.analytics');
    }

    public function drafts()
    {
        $posts = Post::draft()->get();
        return view('dashboard.drafts');
    }

}
