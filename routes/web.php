<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
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
});

Route::middleware('auth:web')->group(function () {
    // Authors Routes
    Route::prefix('authors/{author}')->name('authors.')->group(function () {
        Route::get('', [AuthorController::class, 'profile'])->name('profile')->withoutMiddleware('auth:web');
        Route::post('/follow', [AuthorController::class, 'follow'])->name('follow');
        Route::delete('/follow', [AuthorController::class, 'unfollow'])->name('unfollow');
        Route::get('/followers', [AuthorController::class, 'followers'])->name('followers');
        Route::get('/following', [AuthorController::class, 'following'])->name('following');
    });
    // Public pages
    Route::get('/article/{id}', [PageController::class, 'article'])->name('article');
    Route::get('/category/{slug}', [PageController::class, 'categoryHub'])->name('category.hub');
    Route::get('/tag/{slug}', [PageController::class, 'tagArchive'])->name('tag.archive');
    Route::get('/search', [PageController::class, 'search'])->name('search');
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
    Route::resource('articles', ArticleController::class)->except(['index']);
    Route::get('tags/search', [TagController::class, 'search'])->name('tags.search');
    Route::resource('tags', TagController::class)->except(['edit', 'show', 'create']);
});
