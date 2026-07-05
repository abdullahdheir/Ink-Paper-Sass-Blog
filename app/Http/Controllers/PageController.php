<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Public pages

    public function article($id)
    {
        return view('public.article');
    }

    public function authorProfile($id)
    {
        return view('public.author-profile');
    }

    public function authorProfileJulian()
    {
        return view('public.author-profile-julian');
    }

    public function categoryHub($slug)
    {
        return view('public.category-hub');
    }

    public function tagArchive($slug)
    {
        return view('public.tag-archive');
    }

    public function completeSubscription()
    {
        return view('public.complete-subscription');
    }

    // Auth pages
    public function signIn()
    {
        return view('auth.sign-in');
    }

    public function createAccount()
    {
        return view('auth.create-account');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function resetPassword()
    {
        return view('auth.reset-password');
    }

    // Dashboard pages

    public function write()
    {
        return view('dashboard.writing-editor');
    }

    public function editArticle($id)
    {
        return view('dashboard.edit-article');
    }

    public function articleAnalytics($id)
    {
        return view('dashboard.article-analytics');
    }

    public function earnings()
    {
        return view('dashboard.earnings');
    }

    public function collaboration()
    {
        return view('dashboard.collaboration');
    }

    // Management pages
    public function categories()
    {
        return view('management.categories');
    }

    public function createCategory()
    {
        return view('management.create-category');
    }

    public function editCategory($id)
    {
        return view('management.edit-category');
    }

    public function tags()
    {
        return view('management.tags');
    }

    public function createTag()
    {
        return view('management.create-tag');
    }

    public function content()
    {
        return view('management.content');
    }

    public function members()
    {
        return view('admin.members');
    }

    public function memberSarah()
    {
        return view('admin.member-sarah');
    }

    public function invite()
    {
        return view('management.invite');
    }

    // Settings pages
    public function accountSettings()
    {
        return view('settings.account');
    }

    public function profileSettings()
    {
        return view('settings.profile');
    }

    public function notificationSettings()
    {
        return view('settings.notifications');
    }

    public function securitySettings()
    {
        return view('settings.security');
    }

    // Social pages
    public function followers()
    {
        return view('social.followers');
    }

    public function following()
    {
        return view('social.following');
    }

    // Additional pages
    public function subscription()
    {
        return view('public.subscription');
    }

    public function pricing()
    {
        return view('public.pricing');
    }

    public function designSystem()
    {
        return view('public.design-system');
    }
}
