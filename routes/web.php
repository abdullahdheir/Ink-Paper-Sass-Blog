<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Auth pages
// Route::get('/sign-in', [PageController::class, 'signIn'])->name('auth.sign-in');
// Route::get('/create-account', [PageController::class, 'createAccount'])->name('auth.create-account');
// Route::get('/forgot-password', [PageController::class, 'forgotPassword'])->name('auth.forgot-password');
// Route::get('/reset-password', [PageController::class, 'resetPassword'])->name('auth.reset-password');

Route::middleware('auth:web')->group(function () {
    // Public pages
    Route::get('/', [PageController::class, 'feed'])->name('feed');
    Route::get('/article/{id}', [PageController::class, 'article'])->name('article');
    Route::get('/author/{id}', [PageController::class, 'authorProfile'])->name('author.profile');
    Route::get('/author/julian-vane', [PageController::class, 'authorProfileJulian'])->name('author.julian');
    Route::get('/category/{slug}', [PageController::class, 'categoryHub'])->name('category.hub');
    Route::get('/tag/{slug}', [PageController::class, 'tagArchive'])->name('tag.archive');
    Route::get('/search', [PageController::class, 'search'])->name('search');
    Route::get('/subscription/complete', [PageController::class, 'completeSubscription'])->name('subscription.complete');

    // Dashboard pages
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/analytics', [PageController::class, 'analytics'])->name('dashboard.analytics');
    Route::get('/dashboard/drafts', [PageController::class, 'drafts'])->name('dashboard.drafts');
    Route::get('/dashboard/write', [PageController::class, 'write'])->name('dashboard.write');
    Route::get('/dashboard/edit/{id}', [PageController::class, 'editArticle'])->name('dashboard.edit');
    Route::get('/dashboard/analytics/{id}', [PageController::class, 'postAnalytics'])->name('dashboard.post-analytics');
    Route::get('/dashboard/earnings', [PageController::class, 'earnings'])->name('dashboard.earnings');
    Route::get('/dashboard/collaboration', [PageController::class, 'collaboration'])->name('dashboard.collaboration');

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
    Route::resource('posts', PostController::class);
});
