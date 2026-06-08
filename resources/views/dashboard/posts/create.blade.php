@extends('layouts.dashboard')

@section('title', 'Write Post - Ink & Paper')

@section('page-content')
    @error('*')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-2 text-primary font-ui-label text-ui-label">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <a class="hover:underline" href="{{ route('posts.index') }}">Back to Posts</a>
            </div>
            <button
                class="flex items-center gap-2 px-3 py-1 bg-surface-container-low rounded-full border border-outline-variant">
                <span class="material-symbols-outlined text-[18px] text-primary">cloud_done</span>
                <span class="font-metadata text-metadata text-secondary">Auto-saved</span>
            </button>
        </div>
        <div class="flex">
            <div class="flex-1 max-w-article-max mx-auto w-full distraction-free-focus">
                <div class="editor-container">
                    <textarea name="title"
                        class="w-full bg-transparent border-none focus:outline-none focus:ring-0 font-display-lg text-display-lg resize-none placeholder:text-surface-variant text-on-surface mb-8 overflow-hidden"
                        oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' placeholder="Enter your title..."
                        rows="1"></textarea>
                    <textarea name="content"
                        class="w-full min-h-[614px] bg-transparent border-none focus:outline-none font-body-lg text-body-lg text-on-surface leading-relaxed placeholder:text-surface-variant"
                        placeholder="Type your story..." rows="10"></textarea>
                </div>
            </div>

            <aside
                class="hidden lg:block w-100 shrink-0 h-fit sticky top-24 sidebar-overlay transition-opacity duration-500">
                <div class="space-y-8 border-l border-outline-variant pl-8">

                    <section>
                        <h3 class="font-ui-label text-ui-label text-on-surface mb-4 uppercase tracking-wider">Cover Image
                        </h3>

                        <input type="file" name="cover_image" id="cover-input" class="hidden" accept="image/*">

                        <div id="drop-zone"
                            class="aspect-video w-full rounded-lg bg-surface-container border-2 border-dashed border-outline-variant flex flex-col items-center justify-center gap-2 cursor-pointer hover:bg-surface-container-high transition-all group overflow-hidden relative">

                            <div id="drop-zone-prompt"
                                class="flex flex-col items-center justify-center gap-2 pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-secondary group-hover:text-primary transition-colors">add_a_photo</span>
                                <span class="font-metadata text-metadata text-secondary">Upload or drag photo</span>
                            </div>

                            <img id="cover-preview" class="hidden absolute inset-0 w-full h-full object-cover" />
                        </div>
                    </section>

                    <section class="pt-4 border-t border-outline-variant">
                        <div class="space-y-4">
                            <label class="flex items-center justify-between cursor-pointer group">
                                <span
                                    class="font-ui-label text-ui-label text-secondary group-hover:text-on-surface transition-colors">Draft
                                    Post</span>
                                <div class="relative inline-flex items-center">
                                    <input checked="" name="draft" class="sr-only peer" type="checkbox" />
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
                                    id="published_at" name="published_at" type="datetime-local" />
                            </div>
                        </div>
                    </section>

                    <section x-data="{ tags: [], searchQuery: '', searchResults: [] }" class="space-y-4">
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
                        <template x-for="tag in tags">
                            <input type="hidden" name="tags[]" :value="tag">
                        </template>

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
                </div>
            </aside>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- 1. منطق الـ Drag & Drop للـ Cover Image ---
            const dropZone = document.getElementById('drop-zone');
            const coverInput = document.getElementById('cover-input');
            const dropZonePrompt = document.getElementById('drop-zone-prompt');
            const coverPreview = document.getElementById('cover-preview');

            dropZone.addEventListener('click', () => coverInput.click());

            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    dropZone.classList.add('border-primary', 'bg-surface-container-high');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    dropZone.classList.remove('border-primary', 'bg-surface-container-high');
                }, false);
            });

            dropZone.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                const files = dt.files;
                if (files.length) {
                    coverInput.files = files;
                    handleCoverPreview(files[0]);
                }
            });

            coverInput.addEventListener('change', (e) => {
                if (e.target.files.length) handleCoverPreview(e.target.files[0]);
            });

            function handleCoverPreview(file) {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        coverPreview.src = e.target.result;
                        coverPreview.classList.remove('hidden');
                        dropZonePrompt.classList.add('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            }

            // --- 2. Alpine.js Tag Functions ---
            window.fetchTags = async function() {
                const section = document.querySelector('[x-data*="tags"]');
                const alpineData = Alpine.$data(section);
                const query = alpineData.searchQuery;

                if (query.length > 0) {
                    try {
                        const response = await fetch('{{ route('tags.search') }}?q=' + encodeURIComponent(
                            query));
                        const tags = await response.json();
                        alpineData.searchResults = tags;
                    } catch (error) {
                        console.error('Error fetching tags:', error);
                    }
                }
            };

            window.addTag = function() {
                const section = document.querySelector('[x-data*="tags"]');
                const alpineData = Alpine.$data(section);
                const query = alpineData.searchQuery.trim();

                if (query && !alpineData.tags.includes(query)) {
                    alpineData.tags.push(query);
                    alpineData.searchQuery = '';
                    alpineData.searchResults = [];
                }
            };

            window.selectTag = function(tag) {
                const section = document.querySelector('[x-data*="tags"]');
                const alpineData = Alpine.$data(section);

                if (!alpineData.tags.includes(tag.name)) {
                    alpineData.tags.push(tag.name);
                    alpineData.searchQuery = '';
                    alpineData.searchResults = [];
                }
            };
        });
    </script>
@endsection
