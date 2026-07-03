<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Auth pages
// Route::get('/sign-in', [PageController::class, 'signIn'])->name('auth.sign-in');
// Route::get('/create-account', [PageController::class, 'createAccount'])->name('auth.create-account');
// Route::get('/forgot-password', [PageController::class, 'forgotPassword'])->name('auth.forgot-password');
// Route::get('/reset-password', [PageController::class, 'resetPassword'])->name('auth.reset-password');
Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'feed')->name('feed');
    Route::get('/search', 'search')->name('search');
});

Route::middleware('auth:web')->group(function () {

    Route::prefix('ai')->name('ai.')->group(function () {
        Route::post('generate-article', [AiController::class, 'generateArticle'])->name('article.generate');
    });

    // Authors Routes
    Route::prefix('authors/{author}')->name('authors.')->group(function () {
        Route::get('', [AuthorController::class, 'profile'])->name('profile')->withoutMiddleware('auth:web');
        Route::post('/follow', [AuthorController::class, 'follow'])->name('follow');
        Route::delete('/follow', [AuthorController::class, 'unfollow'])->name('unfollow');
        Route::get('/followers', [AuthorController::class, 'followers'])->name('followers');
        Route::get('/following', [AuthorController::class, 'following'])->name('following');
    });

    // Articles Routes
    Route::prefix('articles')->name('articles.')->group(function () {
        Route::post('', [ArticleController::class, 'store'])->name('store');
        Route::get('create', [ArticleController::class, 'create'])->name('create');
        Route::post('autosave', [ArticleController::class, 'newAutoSave'])->name('autosave.new');
        Route::get('{slug}', [ArticleController::class, 'show'])->name('show');
        Route::prefix('{article}')->group(function () {
            Route::put('', [ArticleController::class, 'update'])->name('update');
            Route::patch('', [ArticleController::class, 'update'])->name('update');
            Route::delete('', [ArticleController::class, 'destroy'])->name('destroy');
            Route::get('edit', [ArticleController::class, 'edit'])->name('edit');
            Route::get('preview', [ArticleController::class, 'preview'])->name('preview');
            Route::post('publish', [ArticleController::class, 'publish'])->name('publish');
            Route::post('unpublish', [ArticleController::class, 'unpublish'])->name('unpublish');
            Route::post('like', [ArticleController::class, 'like'])->name('like');
            Route::delete('like', [ArticleController::class, 'unLike'])->name('unLike');
            Route::post('bookmark', [ArticleController::class, 'bookmark'])->name('bookmark');
            Route::delete('bookmark', [ArticleController::class, 'unBookmark'])->name('unBookmark');
            Route::get('comments', [ArticleController::class, 'comments'])->name('comments');
            Route::post('autosave', [ArticleController::class, 'autoSave'])->name('autosave');
        });
    });

    Route::resource('comments', CommentController::class)->except(['show', 'edit', 'create']);
    Route::post('comments/{comment}/like', [CommentController::class, 'like'])->name('like');

    // Public pages
    Route::get('/category/{slug}', [PageController::class, 'categoryHub'])->name('category.hub');
    Route::get('/subscription/complete', [PageController::class, 'completeSubscription'])->name('subscription.complete');

    // Dashboard pages
    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'dashboard')->name('index');
        Route::get('/analytics', 'analytics')->name('analytics');
        Route::get('/drafts', 'drafts')->name('drafts');
        Route::get('/analytics/{id}', 'postAnalytics')->name('post-analytics');
        Route::get('/earnings', 'earnings')->name('earnings');
        Route::get('/collaboration',  'collaboration')->name('collaboration');
    });
    // Management pages
    Route::get('/manage/categories', [PageController::class, 'categories'])->name('manage.categories');
    Route::get('/manage/categories/create', [PageController::class, 'createCategory'])->name('manage.categories.create');
    Route::get('/manage/categories/{id}/edit', [PageController::class, 'editCategory'])->name('manage.categories.edit');
    Route::get('/manage/tags', [PageController::class, 'tags'])->name('manage.tags');
    Route::get('/manage/tags/create', [PageController::class, 'createTag'])->name('manage.tags.create');
    Route::get('/manage/content', [PageController::class, 'content'])->name('manage.content');
    Route::get('/manage/members', [PageController::class, 'members'])->name('manage.members');
    Route::get('/manage/members/sarah', [PageController::class, 'memberSarah'])->name('manage.members.sarah');
    Route::get('/manage/invite', [PageController::class, 'invite'])->name('manage.invite');

    // Settings pages
    Route::get('/settings/account', [PageController::class, 'accountSettings'])->name('settings.account');
    Route::get('/settings/profile', [PageController::class, 'profileSettings'])->name('settings.profile');
    Route::put('/settings/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/settings/notifications', [PageController::class, 'notificationSettings'])->name('settings.notifications');
    Route::get('/settings/security', [PageController::class, 'securitySettings'])->name('settings.security');

    // Social pages
    Route::get('/profile/followers', [PageController::class, 'followers'])->name('profile.followers');
    Route::get('/profile/following', [PageController::class, 'following'])->name('profile.following');

    // Additional pages
    Route::get('/subscription', [PageController::class, 'subscription'])->name('subscription');
    Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
    Route::get('/design-system', [PageController::class, 'designSystem'])->name('design-system');

    // Existing resource routes
    Route::resource('categories', CategoryController::class);

    Route::get('tags/search', [TagController::class, 'search'])->name('tags.search');
    Route::resource('tags', TagController::class)->except(['edit', 'create']);

    Route::prefix('notifications')->name('notifications.')->controller(NotificationController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('unread-count', 'unreadCount')->name('unread-count');
    Route::get('unread', 'unread')->name('unread');
    Route::post('{notification}/mark-as-read', 'markAsRead')->name('mark-as-read');
    Route::post('{notification}/mark-as-unread', 'markAsUnread')->name('mark-as-unread');
    Route::post('mark-all-as-read', 'markAllAsRead')->name('mark-all-as-read');
    Route::delete('{notification}', 'destroy')->name('destroy');
    Route::delete('', 'deleteAll')->name('delete-all');
});
});
