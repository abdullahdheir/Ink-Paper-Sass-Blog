@extends('layouts.dashboard')

@section('title', 'Create New Category - Ink & Paper')

@section('page-content')
    <!-- Main Content -->
    <div class="max-w-article-max mx-auto">
        <!-- Header Section -->
        <div class="mb-12">
            <nav class="flex items-center gap-2 mb-4 text-on-surface-variant font-metadata text-metadata">
                <a class="hover:text-primary" href="{{ route('categories.index') }}">Categories</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <span class="text-on-surface">New Category</span>
            </nav>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-2">Create New Category
            </h1>
            <p class="text-on-surface-variant font-body-md">Organize your content by creating a specialized focus area for
                your readers.</p>
        </div>

        <!-- Form Container -->
        <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-xl p-8 shadow-sm">
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-8">
                @csrf

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
                        <label class="font-ui-label text-ui-label text-on-surface" for="name">Category Name</label>
                        <input
                            class="w-full px-4 py-3 bg-surface border border-outline-variant/50 rounded text-on-surface font-ui-label text-ui-label focus:border-primary outline-none transition-all"
                            id="name" name="name" value="{{ old('name') }}"
                            placeholder="e.g. Architectural Theory" type="text" required>
                    </div>
                    <div class="space-y-2">
                        <label class="font-ui-label text-ui-label text-on-surface" for="slug">Slug</label>
                        <div class="relative">
                            <span
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-outline font-ui-label text-ui-label">ink-paper.com/</span>
                            <input
                                class="w-full pl-32 pr-4 py-3 bg-surface border border-outline-variant/50 rounded text-on-surface font-ui-label text-ui-label focus:border-primary outline-none transition-all"
                                id="slug" name="slug" placeholder="category-slug" type="text">
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="font-ui-label text-ui-label text-on-surface" for="description">Description</label>
                    <textarea
                        class="w-full px-4 py-3 bg-surface border border-outline-variant/50 rounded text-on-surface font-ui-label text-ui-label focus:border-primary outline-none transition-all resize-none"
                        id="description" name="description" placeholder="Briefly describe the topics covered in this category..."
                        rows="4">{{ old('description') }}</textarea>
                </div>

                <!-- Cover Image Upload (Optional) -->
                {{-- <div class="space-y-4">
                    <label class="font-ui-label text-ui-label text-on-surface">Cover Image (Optional)</label>
                    <div
                        class="relative group cursor-pointer border-2 border-dashed border-outline-variant/50 rounded-xl p-8 hover:border-primary-container transition-colors bg-surface-container-low/30">
                        <input accept="image/*" class="hidden" id="image-upload" name="image" type="file" />
                        <div class="flex flex-col items-center justify-center text-center space-y-3">
                            <div
                                class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">add_photo_alternate</span>
                            </div>
                            <div class="space-y-1">
                                <p class="font-ui-label text-ui-label text-on-surface">Click to upload or drag and drop</p>
                                <p class="font-metadata text-metadata text-on-surface-variant">SVG, PNG, JPG (max. 5MB) •
                                    Recommended size 1200x630px</p>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Form Actions -->
                <div class="pt-6 flex flex-col-reverse md:flex-row gap-4 border-t border-outline-variant/30">
                    <a href="{{ route('categories.index') }}"
                        class="w-full md:w-auto px-8 py-3 border border-on-surface rounded text-on-surface font-ui-button text-ui-button hover:bg-surface-container-high transition-colors text-center">
                        Cancel
                    </a>
                    <button type="submit"
                        class="w-full md:flex-grow py-3 bg-primary-container text-on-primary-container rounded shadow-lg shadow-primary-container/20 font-ui-button text-ui-button hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span>Create Category</span>
                        <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
