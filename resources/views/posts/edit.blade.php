@extends('layouts.dashboard')

@section('title', 'Edit Post - Ink & Paper')
@stop

@section('page-content')
    <!-- Header Section -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-2 text-primary font-ui-label text-ui-label">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            <a class="hover:underline" href="{{ route('posts.index') }}">Back to Posts</a>
        </div>
        <div class="flex items-center gap-2 px-3 py-1 bg-surface-container-low rounded-full border border-outline-variant">
            <span class="material-symbols-outlined text-[18px] text-primary">cloud_done</span>
            <span class="font-metadata text-metadata text-secondary">Auto-saved</span>
        </div>
    </div>

    <!-- Editor Canvas -->
    <div class="max-w-article-max mx-auto w-full">
        <div class="editor-container">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
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

                <!-- Title Field -->
                <div class="mb-8">
                    <label
                        class="font-ui-label text-ui-label text-on-surface-variant block mb-2 uppercase tracking-wider">Title</label>
                    <input
                        class="w-full bg-transparent border-none focus:ring-0 font-display-lg text-display-lg resize-none placeholder:text-surface-variant text-on-surface"
                        name="title" placeholder="Enter your title..." type="text"
                        value="{{ old('title', $post->title) }}" required>
                </div>

                <!-- Category Selection -->
                <div class="mb-8">
                    <label
                        class="font-ui-label text-ui-label text-on-surface-variant block mb-2 uppercase tracking-wider">Category</label>
                    <select
                        class="w-full bg-white border border-outline-variant rounded-lg px-4 py-3 font-ui-label text-ui-label focus:ring-1 focus:ring-primary focus:border-primary transition-all"
                        name="category_id">
                        <option value="">-- Select a Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Main Content Editor -->
                <div class="mb-8">
                    <label
                        class="font-ui-label text-ui-label text-on-surface-variant block mb-2 uppercase tracking-wider">Content</label>
                    <textarea
                        class="w-full min-h-[400px] bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 font-body-lg text-body-lg text-on-surface leading-relaxed placeholder:text-surface-variant focus:ring-1 focus:ring-primary focus:border-primary transition-all resize-none"
                        name="content" placeholder="Type your story..." rows="15" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-outline-variant">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-error font-ui-button flex items-center gap-2 hover:bg-error-container/20 px-4 py-2 rounded-lg transition-colors"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                            <span class="material-symbols-outlined">delete</span>
                            Delete Post
                        </button>
                    </form>
                    <div class="flex gap-4">
                        <a href="{{ route('posts.index') }}"
                            class="px-4 py-2 font-ui-button text-ui-button border border-on-surface text-on-surface rounded-lg hover:bg-surface-container-low transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                            class="bg-primary-container text-on-primary px-8 py-3 rounded-lg font-ui-button text-ui-button hover:bg-primary transition-all active:scale-95 shadow-sm">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
