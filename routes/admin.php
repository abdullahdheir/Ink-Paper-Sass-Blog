<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth:web', 'admin'])->group(function () {
      // Management pages
    Route::resource('categories', CategoryController::class);

    // Route::get('/', [PageController::class, 'editCategory'])->name('manage.categories.edit');
    // Route::get('/manage/tags', [PageController::class, 'tags'])->name('manage.tags');
    // Route::get('/manage/tags/create', [PageController::class, 'createTag'])->name('manage.tags.create');
    // Route::get('/manage/content', [PageController::class, 'content'])->name('manage.content');
    Route::get('/manage/members', [PageController::class, 'members'])->name('manage.members');
    // Route::get('/manage/members/sarah', [PageController::class, 'memberSarah'])->name('manage.members.sarah');
    // Route::get('/manage/invite', [PageController::class, 'invite'])->name('manage.invite');

    // Add more admin routes here
});
