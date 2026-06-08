@extends('layouts.dashboard')

@section('title', 'Edit Category - Ink & Paper')

@section('page-content')
    <!-- Main Content -->
    <div class="max-w-article-max mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col gap-2 mb-10">
            <div class="flex items-center gap-2 text-primary font-ui-label text-ui-label mb-2">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <a class="hover:underline" href="{{ route('categories.index') }}">Back to Categories</a>
            </div>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface">Edit Category:
                {{ $category->name }}</h1>
            <p class="text-on-surface-variant font-body-md max-w-xl">Organize your thoughts on hardware, software, and the
                future of digital logic. Ensure your slug and description are SEO-ready.</p>
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="POST"
            class="space-y-8 bg-surface-container-lowest p-8 rounded-xl border border-outline-variant/30 shadow-sm">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-error-container border border-error text-on-error-container px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-ui-label text-ui-label text-on-surface-variant block" for="name">Category
                        Name</label>
                    <input
                        class="w-full bg-white border border-outline-variant px-4 py-3 rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-ui-label transition-all"
                        id="name" name="name" type="text" value="{{ old('name', $category->name) }}" required>
                </div>
                <div class="space-y-2">
                    <label class="font-ui-label text-ui-label text-on-surface-variant block" for="slug">URL Slug</label>
                    <div class="flex">
                        <span
                            class="bg-surface-container px-4 py-3 border border-r-0 border-outline-variant rounded-l-lg font-metadata text-on-surface-variant">inkpaper.com/tag/</span>
                        <input
                            class="w-full bg-white border border-outline-variant px-4 py-3 rounded-r-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-ui-label transition-all"
                            id="slug" name="slug" type="text" value="{{ old('slug', $category->slug ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-ui-label text-ui-label text-on-surface-variant block"
                    for="description">Description</label>
                <textarea
                    class="w-full bg-white border border-outline-variant px-4 py-3 rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-body-md transition-all"
                    id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-between pt-4 border-t border-outline-variant/30">
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-error font-ui-button flex items-center gap-2 hover:bg-error-container/20 px-4 py-2 rounded-lg transition-colors"
                        onclick="return confirm('Are you sure you want to delete this category?')">
                        <span class="material-symbols-outlined">delete</span>
                        Delete Category
                    </button>
                </form>
                <div class="flex gap-4">
                    <a href="{{ route('categories.index') }}"
                        class="border border-on-surface text-on-surface px-6 py-2.5 rounded-lg font-ui-button hover:bg-surface-container transition-all">Cancel</a>
                    <button type="submit"
                        class="bg-primary-container text-on-primary px-8 py-2.5 rounded-lg font-ui-button hover:bg-primary shadow-md transition-all">Save
                        Changes</button>
                </div>
            </div>
        </form>
    </div>
@endsection
