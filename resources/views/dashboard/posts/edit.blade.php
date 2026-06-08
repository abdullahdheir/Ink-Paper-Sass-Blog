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
                    <section x-data="{ tags: {{ json_encode($post->tags->pluck('name')->toArray()) }}, searchQuery: '', searchResults: [] }" class="space-y-4">
                        <h3 class="font-ui-label text-ui-label text-on-surface mb-4 uppercase tracking-wider">Tags</h3>

                        <!-- Selected Tags Display -->
                        <div class="flex flex-wrap gap-2 min-h-[40px]">
                            <template x-for="tag in tags" :key="tag">
                                <span
                                    class="bg-primary-fixed text-on-primary-fixed px-3 py-1 rounded-full font-metadata text-metadata flex items-center gap-1">
                                    <span x-text="'#' + tag"></span>
                                    <button type="button" @click="tags = tags.filter(t => t !== tag)"
                                        class="hover:text-white transition-colors">
                                        <span class="material-symbols-outlined text-[14px]">close</span>
                                    </button>
                                </span>
                            </template>
                            <span x-show="tags.length === 0" class="text-secondary font-metadata text-metadata">No tags
                                selected</span>
                        </div>

                        <!-- Hidden Input for Form Submission -->
                        <input type="hidden" name="tags[]" :value="tag" x-for="tag in tags">

                        <!-- Search Input -->
                        <div class="relative">
                            <input x-model="searchQuery"
                                @input="if(searchQuery.length > 0) { fetchTags() } else { searchResults = [] }"
                                @keydown.enter.prevent="addTag()" @keydown.comma.prevent="addTag()"
                                class="w-full bg-white border border-outline-variant rounded-lg px-4 py-2 font-metadata text-metadata focus:ring-1 focus:ring-primary focus:border-primary transition-all"
                                placeholder="Type tag name and press Enter or Comma..." type="text" />

                            <!-- Search Results Dropdown -->
                            <div x-show="searchResults.length > 0" @click.away="searchResults = []"
                                class="absolute w-full mt-1 bg-white border border-outline-variant rounded-lg shadow-lg max-h-[200px] overflow-y-auto z-10">
                                <template x-for="tag in searchResults" :key="tag.id">
                                    <div @click="selectTag(tag)"
                                        class="px-4 py-2 hover:bg-surface-container-high cursor-pointer flex items-center justify-between">
                                        <span x-text="'#' + tag.name"></span>
                                        <span class="text-secondary text-sm">Press Enter to select</span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </section>

                    <section class="pt-4 border-t border-outline-variant">
                        <div class="space-y-4">
                            <label class="flex items-center justify-between cursor-pointer group">
                                <span
                                    class="font-ui-label text-ui-label text-secondary group-hover:text-on-surface transition-colors">Draft
                                    Post</span>
                                <div class="relative inline-flex items-center">
                                    <input {{ $post->status === 'draft' ? 'checked' : '' }} name="draft"
                                        class="sr-only peer" type="checkbox" />
                                    <div
                                        class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                                    </div>
                                </div>
                            </label>

                            <div class="space-y-2">
                                <label class="font-ui-label text-ui-label text-on-surface-variant block"
                                    for="published_at">Publish Date</label>
                                <input
                                    class="w-full bg-white border border-outline-variant rounded-lg px-4 py-2 font-ui-label text-ui-label focus:ring-1 focus:ring-primary focus:border-primary transition-all"
                                    id="published_at" name="published_at" type="datetime-local"
                                    value="{{ $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '' }}" />
                            </div>
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
