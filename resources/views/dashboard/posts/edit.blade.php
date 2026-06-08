@extends('layouts.dashboard')

@section('title', 'Edit Post - Ink & Paper')

@section('page-content')
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-2 text-primary font-ui-label text-ui-label">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <a class="hover:underline" href="{{ route('posts.index') }}">Back to Posts</a>
            </div>
            <div
                class="flex items-center gap-2 px-3 py-1 bg-surface-container-low rounded-full border border-outline-variant">
                <span class="material-symbols-outlined text-[18px] text-primary">cloud_done</span>
                <span class="font-metadata text-metadata text-secondary">Auto-saved</span>
            </div>
        </div>

        <div class="flex">
            <div class="flex-1 max-w-article-max mx-auto w-full">
                <div class="editor-container">
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
                </div>
            </div>

            <aside class="hidden lg:block w-100 shrink-0 h-fit sticky top-24">
                <div class="space-y-8 border-l border-outline-variant pl-8">
                    <!-- Cover Image -->
                    <section>
                        <h3 class="font-ui-label text-ui-label text-on-surface mb-4 uppercase tracking-wider">Cover Image
                        </h3>
                        <input type="file" name="cover_image" class="hidden" accept="image/*">
                        <div
                            class="aspect-video w-full rounded-lg bg-surface-container border-2 border-dashed border-outline-variant flex flex-col items-center justify-center gap-2 cursor-pointer hover:bg-surface-container-high transition-all">
                            <span class="material-symbols-outlined text-secondary">add_a_photo</span>
                            <span class="font-metadata text-metadata text-secondary">Upload or drag photo</span>
                        </div>
                    </section>

                    <!-- Tags -->
                    <section>
                        <h3 class="font-ui-label text-ui-label text-on-surface mb-4 uppercase tracking-wider">Tags</h3>
                        <div class="space-y-2 max-h-[200px] overflow-y-auto">
                            @forelse($tags as $tag)
                                <label
                                    class="flex items-center gap-3 p-2 hover:bg-surface-container rounded cursor-pointer">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary"
                                        {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <span class="font-metadata text-metadata text-on-surface">{{ $tag->name }}</span>
                                </label>
                            @empty
                                <p class="text-secondary font-metadata text-metadata">No tags available. <a
                                        href="{{ route('manage.tags.create') }}"
                                        class="text-primary hover:underline">Create one</a></p>
                            @endforelse
                        </div>
                    </section>
                </div>
            </aside>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-between pt-6 border-t border-outline-variant mt-8">
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
@endsection
