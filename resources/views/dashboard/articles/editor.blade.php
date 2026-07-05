{{-- resources/views/dashboard/editor.blade.php --}}
@extends('layouts.app')

@section('title', isset($article) ? 'Edit Article' : 'Create Article')

@push('styles')
    <style>
        /* ── Quill overrides ───────────────────────────────────────────── */
        .ql-toolbar.ql-snow {
            border: none !important;
            border-bottom: 1px solid #ccc3d8 !important;
            background: #f3f3f3;
            padding: 0.5rem;
            flex-wrap: wrap;
            gap: 0.25rem;
        }

        .ql-container.ql-snow {
            border: none !important;
            font-family: 'Source Serif 4', serif;
            font-size: 18px;
            line-height: 1.75;
            min-height: 420px;
        }

        .ql-editor {
            padding: 2rem;
            min-height: 420px;
        }

        .ql-editor.ql-blank::before {
            color: #7b7487;
            font-style: italic;
            font-family: 'Source Serif 4', serif;
        }

        .ql-snow .ql-stroke {
            stroke: #4a4455;
        }

        .ql-snow .ql-fill {
            fill: #4a4455;
        }

        .ql-snow .ql-picker {
            color: #4a4455;
        }

        .ql-snow .ql-active .ql-stroke {
            stroke: #630ed4;
        }

        .ql-snow .ql-active .ql-fill {
            fill: #630ed4;
        }

        .ql-snow button:hover .ql-stroke {
            stroke: #630ed4;
        }

        /* ── TomSelect overrides ───────────────────────────────────────── */
        .ts-wrapper .ts-control {
            border: 1px solid #ccc3d8 !important;
            border-radius: 0.5rem;
            background: #f3f3f3;
            padding: 0.5rem 0.75rem;
            font-size: 14px;
            font-family: Inter, sans-serif;
            box-shadow: none;
            min-height: 40px;
        }

        .ts-wrapper.focus .ts-control {
            border-color: #7c3aed !important;
            box-shadow: 0 0 0 3px rgb(124 58 237 / 12%) !important;
        }

        .ts-wrapper.multi .ts-control .item {
            background: #eaddff;
            color: #25005a;
            border-radius: 999px;
            padding: 2px 10px;
            font-size: 12px;
            border: none;
        }

        .ts-dropdown {
            border: 1px solid #ccc3d8;
            border-radius: 0.5rem;
            box-shadow: 0 4px 16px rgb(0 0 0 / 10%);
            font-size: 14px;
            font-family: Inter, sans-serif;
        }

        .ts-dropdown .option {
            padding: 0.6rem 0.875rem;
            color: #1a1c1c;
        }

        .ts-dropdown .option:hover,
        .ts-dropdown .option.active {
            background: #eaddff;
            color: #25005a;
        }

        .ts-dropdown .option.selected {
            background: #f3eeff;
            color: #630ed4;
            font-weight: 500;
        }

        .ts-dropdown .create {
            color: #630ed4;
            font-weight: 500;
        }

        /* ── Cover image preview ───────────────────────────────────────── */
        #cover-preview {
            display: none;
        }

        #cover-preview.show {
            display: block;
        }

        #cover-zone.has-image {
            display: none;
        }

        /* ── Toggle switch ─────────────────────────────────────────────── */
        .switch-label {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }

        .switch-label input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .switch-slider {
            position: absolute;
            inset: 0;
            background: #ccc3d8;
            border-radius: 999px;
            transition: background .2s;
            cursor: pointer;
        }

        .switch-slider::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            transition: transform .2s;
            box-shadow: 0 1px 3px rgb(0 0 0/.15);
        }

        input:checked~.switch-slider {
            background: #7c3aed;
        }

        input:checked~.switch-slider::after {
            transform: translateX(20px);
        }

        /* ── Auto-save indicator ───────────────────────────────────────── */
        #autosave-status {
            transition: opacity .3s;
        }

        /* ── AI loading animation ──────────────────────────────────────── */
        @keyframes ai-pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .4;
            }
        }

        .ai-loading {
            animation: ai-pulse .9s infinite;
        }

        /* ── Slug prefix ───────────────────────────────────────────────── */
        .slug-prefix {
            background: #f3f3f3;
            border: 1px solid #ccc3d8;
            border-right: none;
            border-radius: .5rem 0 0 .5rem;
            padding: .4rem .6rem;
            font-size: 12px;
            color: #7b7487;
            white-space: nowrap;
        }

        #slug-input {
            border-radius: 0 .5rem .5rem 0 !important;
        }
    </style>
@endpush

@section('content')
    {{-- ── Sticky action bar ──────────────────────────────────────────────────── --}}
    <header
        class="sticky top-0 z-50 bg-white border-b border-outline-variant px-6 h-14 flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-6">
            <a href="{{ route('dashboard.index') }}"
                class="flex items-center gap-1.5 text-secondary hover:text-primary transition-colors font-ui-label text-ui-label">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span> All Articles
            </a>
            <span id="autosave-status" class="hidden md:flex items-center gap-1.5 text-metadata font-metadata text-secondary">
                <span id="autosave-dot" class="w-2 h-2 rounded-full bg-green-500"></span>
                <span id="autosave-text">Saved</span>
            </span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ isset($article) ? route('articles.preview', $article->id) : '#' }}" target="_blank" id="preview_btn"
                class="px-4 py-2 border border-outline text-on-surface rounded-lg font-ui-button text-sm hover:bg-surface-container-low transition-all">
                Preview
            </a>
            <button type="button" onclick="submitForm('draft')"
                class="hidden sm:block px-4 py-2 cursor-pointer border border-outline text-on-surface rounded-lg font-ui-button text-sm hover:bg-surface-container-low transition-all">
                Save Draft
            </button>
            <button type="button" onclick="submitForm('published')"
                class="px-5 py-2 bg-primary-container cursor-pointer text-on-primary rounded-lg font-ui-button text-sm hover:opacity-90 transition-all flex items-center gap-1.5 shadow-sm">
                Publish <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </button>
        </div>
    </header>

    {{-- ── Main form ──────────────────────────────────────────────────────────── --}}
    <form id="article-form" method="POST"
        action="{{ isset($article) ? route('articles.update', $article->id) : route('articles.store') }}"
        enctype="multipart/form-data">
        @csrf
        @isset($article)
            @method('PUT')
        @endisset
        <input type="hidden" name="status" id="form-status" value="draft">
        <input type="hidden" name="content" id="content-input">
        <input type="hidden" name="reading_time" id="reading-time-input" value="0">

        @error('*')
            <div
                class="bg-error-container max-w-300 mx-auto mt-5 text-on-error-container font-ui-label text-ui-label rounded-lg p-4 mb-6">
                {{ $message }}
            </div>
        @enderror

        <main class="max-w-300 mx-auto px-6 py-10 grid grid-cols-1 lg:grid-cols-[1fr_360px] gap-10">

            {{-- ── LEFT: Writing area ─────────────────────────────────────────── --}}
            <div class="space-y-8">

                {{-- Cover Image --}}
                <div>
                    {{-- Upload zone --}}
                    <div id="cover-zone"
                        class="relative group cursor-pointer border-2 border-dashed border-outline-variant bg-white rounded-xl p-12 flex flex-col items-center justify-center text-center transition-colors hover:border-primary hover:bg-surface-container-low {{ isset($article) && $article->cover_url ? 'has-image' : '' }}">
                        <div
                            class="w-16 h-16 rounded-full bg-surface-container-high flex items-center justify-center mb-4 group-hover:bg-primary-fixed transition-colors">
                            <span
                                class="material-symbols-outlined text-[32px] text-secondary group-hover:text-primary">add_a_photo</span>
                        </div>
                        <p class="font-ui-label text-sm text-on-surface mb-1">Drop cover image here or click to browse</p>
                        <p class="text-xs text-secondary">Recommended: 1200×630px · Max 2MB</p>
                        <input id="cover-input" name="cover_image" type="file" accept="image/*"
                            class="absolute inset-0 opacity-0 cursor-pointer" onchange="handleCoverImage(this)">
                    </div>

                    {{-- Preview --}}
                    <div id="cover-preview"
                        class="relative rounded-xl overflow-hidden {{ isset($article) && $article->cover_url ? 'show' : '' }}">
                        <img id="cover-img" src="{{ isset($article) ? $article->cover_url : '' }}" alt="Cover"
                            class="w-full h-56 object-cover">
                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                            <button type="button" onclick="changeCover()"
                                class="px-4 py-2 bg-white text-on-surface rounded-lg text-sm font-medium hover:bg-surface-container-low transition-all">
                                <span class="material-symbols-outlined text-[16px] align-middle">edit</span> Change
                            </button>
                            <button type="button" onclick="removeCover()"
                                class="px-4 py-2 bg-white text-error rounded-lg text-sm font-medium hover:bg-red-50 transition-all">
                                <span class="material-symbols-outlined text-[16px] align-middle">delete</span> Remove
                            </button>
                        </div>
                        {{-- Hidden re-trigger input --}}
                        <input id="cover-input-2" name="cover_image" type="file" accept="image/*" class="hidden"
                            onchange="handleCoverImage(this)">
                    </div>
                </div>

                {{-- Title --}}
                <div class="space-y-1">
                    <textarea id="title-input" name="title" rows="1"
                        class="w-full bg-transparent border-none focus:ring-0 text-[38px] font-bold text-on-surface resize-none p-0 leading-tight font-headline-md overflow-hidden"
                        placeholder="Your article title..." oninput="autoResize(this); updateTitleCounter(); scheduleAutoSave();"
                        maxlength="120">{{ old('title', $article->title ?? '') }}</textarea>
                    <div class="flex justify-end">
                        <span id="title-counter" class="text-xs text-secondary">0 / 120</span>
                    </div>
                </div>

                {{-- Excerpt --}}
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label class="font-ui-label text-sm font-semibold text-on-surface">Short Summary</label>
                        <button type="button" onclick="generateAI('summary')"
                            class="flex cursor-pointer items-center gap-1 text-primary hover:opacity-75 transition text-xs font-medium">
                            <span class="material-symbols-outlined text-[15px]">auto_awesome</span>
                            <span id="ai-summary-label">Generate with AI</span>
                        </button>
                    </div>
                    <textarea id="excerpt-input" name="excerpt" rows="2"
                        class="w-full bg-white border border-outline-variant rounded-lg p-4 focus:border-primary focus:ring-1 focus:ring-primary/20 transition font-body-md text-sm text-on-surface resize-none outline-none"
                        placeholder="Write a brief summary that appears in article previews..."
                        oninput="updateExcerptCounter(); scheduleAutoSave();" maxlength="280">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
                    <div class="flex justify-between">
                        <p class="text-xs text-secondary italic">Appears in feeds and search results</p>
                        <span id="excerpt-counter" class="text-xs text-secondary">0 / 280</span>
                    </div>
                </div>

                {{-- Quill Editor --}}
                <div class="border border-outline-variant rounded-xl bg-white shadow-sm overflow-hidden">
                    {{-- AI Write button in toolbar area --}}
                    <div
                        class="flex items-center justify-between px-3 py-2 bg-surface-container-low border-b border-outline-variant">
                        <span class="text-xs text-secondary font-medium">Content</span>
                        <button type="button" onclick="generateAI('content')"
                            class="flex cursor-pointer items-center gap-1 px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary/20 rounded-lg transition text-xs font-medium">
                            <span class="material-symbols-outlined text-[15px]">auto_awesome</span>
                            <span id="ai-content-label">Write with AI</span>
                        </button>
                    </div>

                    {{-- Quill mounts here --}}
                    <div id="quill-editor">{{ old('content', $article->content ?? '') }}</div>

                    {{-- Word count --}}
                    <div
                        class="flex items-center justify-between px-4 py-2 border-t border-outline-variant bg-surface-container-low text-xs text-secondary">
                        <span id="word-count">0 words · ~0 min read</span>
                        <span class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">spellcheck</span> Spell check on
                        </span>
                    </div>
                </div>

            </div>

            {{-- ── RIGHT: Sidebar settings ─────────────────────────────────────── --}}
            <aside
                class="space-y-5 lg:sticky lg:top-20 lg:max-h-[calc(100vh-6rem)] lg:overflow-y-auto custom-scrollbar pb-4">

                {{-- Publishing Card --}}
                <div class="bg-white rounded-xl border border-outline-variant p-5 shadow-sm">
                    <h3 class="text-sm font-semibold text-on-surface mb-4">Publishing</h3>

                    {{-- Status segmented control --}}
                    <div class="mb-4">
                        <p class="text-xs text-secondary mb-2">Status</p>
                        <div class="flex rounded-lg border border-outline-variant overflow-hidden text-sm">
                            @foreach ($statuses as $status)
                                <label class="flex-1 text-center cursor-pointer">
                                    <input type="radio" name="status_display" value="{{ $status->value }}"
                                        class="sr-only status-radio"
                                        {{ old('status', $article->status->value ?? 'draft') === $status->value ? 'checked' : '' }}>
                                    <span
                                        class="status-pill block py-2 font-medium transition-colors {{ old('status', $article->status->value ?? 'draft') === $status->value ? 'bg-primary text-white' : 'text-secondary hover:bg-surface-container-low' }}">
                                        {{ $status->getLabel() }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Scheduled datetime --}}
                    <div id="scheduled-datetime"
                        class="{{ old('status', $article->status ?? '') === 'scheduled' ? '' : 'hidden' }} mb-4">
                        <label class="text-xs text-secondary mb-1 block">Publish at</label>
                        <input type="datetime-local" name="scheduled_at"
                            value="{{ old('scheduled_at', isset($article) ? $article->scheduled_at?->format('Y-m-d\TH:i') : '') }}"
                            class="w-full border border-outline-variant rounded-lg px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition bg-surface-container-low">
                    </div>

                    <div class="flex flex-col gap-2">
                        <button type="button" onclick="submitForm('published')"
                            class="w-full py-2.5 cursor-pointer bg-primary-container text-on-primary rounded-lg text-sm font-semibold hover:opacity-90 transition shadow-sm">
                            Publish Article
                        </button>
                        <button type="button" onclick="submitForm('draft')"
                            class="w-full py-2.5 border cursor-pointer border-outline text-on-surface rounded-lg text-sm font-medium hover:bg-surface-container-low transition">
                            Save Draft
                        </button>
                    </div>
                </div>

                {{-- Category Card --}}
                <div class="bg-white rounded-xl border border-outline-variant p-5 shadow-sm">
                    <h3 class="text-sm font-semibold text-on-surface mb-3">Category</h3>
                    <select id="category-select" name="category_id">
                        <option value="">Select a category...</option>
                        @foreach ($categories ?? [] as $cat)
                            <option value="{{ $cat->id }}" data-color="{{ $cat->color ?? '#7C3AED' }}"
                                {{ old('category_id', $article->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    <a href="{{ route('categories.create') }}" class="mt-2 block text-xs text-primary hover:underline">
                        + Create new category
                    </a>
                </div>

                {{-- Tags Card --}}
                <div class="bg-white rounded-xl border border-outline-variant p-5 shadow-sm">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-semibold text-on-surface">Tags</h3>
                        <span id="tag-counter"
                            class="text-xs text-secondary">{{ isset($article) ? $article->tags->count() : 0 }} / 5</span>
                    </div>
                    <select id="tags-select" name="tags[]" multiple>
                        @foreach ($tags ?? [] as $tag)
                            <option value="{{ $tag->id }}"
                                {{ collect(old('tags', isset($article) ? $article->tags->pluck('id')->toArray() : []))->contains($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-2 text-xs text-secondary">Press Enter to create a new tag</p>
                </div>

                {{-- SEO Card --}}
                <div class="bg-white rounded-xl border border-outline-variant shadow-sm overflow-hidden">
                    <button type="button"
                        class="w-full flex items-center justify-between px-5 py-4 hover:bg-surface-container-low transition"
                        onclick="toggleSEO()">
                        <h3 class="text-sm font-semibold text-on-surface">SEO & Metadata</h3>
                        <span id="seo-chevron"
                            class="material-symbols-outlined text-secondary transition-transform">expand_more</span>
                    </button>
                    <div id="seo-panel" class="hidden px-5 pb-5 space-y-3 border-t border-outline-variant pt-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-xs text-secondary">SEO Title</label>
                                <span id="seo-title-counter" class="text-xs text-secondary">0 / 60</span>
                            </div>
                            <input type="text" name="seo[title]" id="seo-title"
                                class="w-full border border-outline-variant rounded-lg px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition bg-surface-container-low"
                                placeholder="Custom SEO title" maxlength="60"
                                value="{{ old('seo.title', $article->seo->title ?? '') }}"
                                oninput="document.getElementById('seo-title-counter').textContent = this.value.length + ' / 60'">
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-xs text-secondary">SEO Keywords</label>
                                <span id="seo-keywords-counter" class="text-xs text-secondary">0 / 160</span>
                            </div>
                            <input type="text" name="seo[keywords]" id="seo-keywords"
                                class="w-full border border-outline-variant rounded-lg px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition bg-surface-container-low"
                                placeholder="Custom SEO keywords" maxlength="160"
                                value="{{ old('seo.keywords', $article->seo->keywords ?? '') }}"
                                oninput="document.getElementById('seo-keywords-counter').textContent = this.value.length + ' / 160'">
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <label class="text-xs text-secondary">Meta Description</label>
                                <span id="seo-desc-counter" class="text-xs text-secondary">0 / 160</span>
                            </div>
                            <textarea name="seo[description]" rows="3" maxlength="160" id="seo-description"
                                class="w-full border border-outline-variant rounded-lg px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition bg-surface-container-low resize-none"
                                placeholder="Brief description for search engines..."
                                oninput="document.getElementById('seo-desc-counter').textContent = this.value.length + ' / 160'">{{ old('seo.description', $article->seo->description ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="text-xs text-secondary mb-1 block">URL Slug</label>
                            <div class="flex">
                                <span class="slug-prefix">{{ config('app.url') }}/articles/</span>
                                <input type="text" name="slug" id="slug-input"
                                    class="flex-1 border border-outline-variant rounded-r-lg px-3 py-2 text-sm outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition bg-surface-container-low"
                                    value="{{ old('slug', $article->slug ?? '') }}" placeholder="article-slug">
                            </div>
                        </div>

                        {{-- Google preview --}}
                        <div class="border border-outline-variant rounded-lg p-3 bg-surface-container-low">
                            <p class="text-xs text-secondary mb-1.5 font-medium">Search preview</p>
                            <p class="text-[#1a0dab] text-sm font-medium leading-tight" id="preview-title">Article Title
                            </p>
                            <p class="text-[#006621] text-xs">{{ config('app.url') }}/articles/<span
                                    id="preview-slug">slug</span></p>
                            <p class="text-[#545454] text-xs mt-0.5 leading-relaxed" id="preview-desc">Meta description
                                appears here...</p>
                        </div>
                    </div>
                </div>

                {{-- Options Card --}}
                <div class="bg-white rounded-xl border border-outline-variant p-5 shadow-sm">
                    <h3 class="text-sm font-semibold text-on-surface mb-4">Options</h3>
                    <div class="space-y-4">
                        @foreach ([['name' => 'allow_comments', 'label' => 'Allow Comments', 'hint' => 'Enable reader interaction', 'default' => true], ['name' => 'is_featured', 'label' => 'Feature this article', 'hint' => 'Pin to top of your feed', 'default' => false], ['name' => 'notify_subs', 'label' => 'Send to subscribers', 'hint' => 'Notify your mailing list', 'default' => true]] as $toggle)
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-on-surface">{{ $toggle['label'] }}</p>
                                    <p class="text-xs text-secondary">{{ $toggle['hint'] }}</p>
                                </div>
                                <label class="switch-label">
                                    <input type="checkbox" name="{{ $toggle['name'] }}" value="1"
                                        {{ old($toggle['name'], isset($article) ? $article->{$toggle['name']} : $toggle['default']) ? 'checked' : '' }}>
                                    <span class="switch-slider"></span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Writing tip --}}
                <div class="p-4 bg-primary-fixed rounded-xl border border-outline-variant/30">
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-primary text-[20px]">lightbulb</span>
                        <div>
                            <p class="text-sm font-semibold text-on-surface mb-1">Writing Tip</p>
                            <p class="text-xs text-on-surface/70 leading-relaxed">
                                Articles with 3+ relevant tags and a clear summary get 40% more engagement on average.
                            </p>
                        </div>
                    </div>
                </div>

            </aside>
        </main>
    </form>
@endsection

@push('scripts')
    <script>
        let quill, tagsSelect;
        document.addEventListener('DOMContentLoaded', function() {
            // ─────────────────────────────────────────────────────────────────────────────
            // 1. Quill Editor
            // ─────────────────────────────────────────────────────────────────────────────
            quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Tell your story...',
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, 3, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }],
                        [{
                            align: []
                        }],
                        ['link', 'image'],
                        ['clean'],
                    ],
                },
            });

            // Set initial content from Blade (for edit mode)
            @isset($article)
                quill.root.innerHTML = {!! json_encode($article->content) !!};
            @endisset

            // Word count
            quill.on('text-change', () => {
                const text = quill.getText().trim();
                const words = text ? text.split(/\s+/).length : 0;
                const mins = Math.max(1, Math.ceil(words / 200));
                document.getElementById('word-count').textContent = `${words} words · ~${mins} min read`;
                document.getElementById('reading-time-input').value = mins;
                scheduleAutoSave();
            });

            // ─────────────────────────────────────────────────────────────────────────────
            // 2. TomSelect — Category
            // ─────────────────────────────────────────────────────────────────────────────
            new TomSelect('#category-select', {
                placeholder: 'Select a category...',
                maxItems: 1,
                create: false,
                allowEmptyOption: true,
                render: {
                    option: (data, escape) => {
                        const color = data.$option?.dataset?.color ?? '#7C3AED';
                        return `<div class="flex items-center gap-2 py-1">
                <span style="background:${color}" class="inline-block w-2.5 h-2.5 rounded-full flex-shrink-0"></span>
                ${escape(data.text)}
            </div>`;
                    },
                    item: (data, escape) => {
                        const color = data.$option?.dataset?.color ?? '#7C3AED';
                        return `<div class="flex items-center gap-2">
                <span style="background:${color}" class="inline-block w-2 h-2 rounded-full flex-shrink-0"></span>
                ${escape(data.text)}
            </div>`;
                    },
                },
            });

            // ─────────────────────────────────────────────────────────────────────────────
            // 3. TomSelect — Tags (max 5, create new)
            // ─────────────────────────────────────────────────────────────────────────────
            tagsSelect = new TomSelect('#tags-select', {
                placeholder: 'Add tags...',
                maxItems: 5,
                create: true,
                persist: false,
                plugins: ['remove_button'],
                onItemAdd() {
                    this.setTextboxValue('');
                    this.refreshOptions();
                },
                onChange(val) {
                    document.getElementById('tag-counter').textContent = `${val.length} / 5`;
                },
            });
        });

        // ─────────────────────────────────────────────────────────────────────────────
        // 4. Cover Image Preview
        // ─────────────────────────────────────────────────────────────────────────────
        function handleCoverImage(input) {
            const file = input.files[0];
            if (!file) return;
            if (file.size > 2 * 1024 * 1024) {
                alert('Image must be smaller than 2MB');
                input.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('cover-img').src = e.target.result;
                document.getElementById('cover-preview').classList.add('show');
                document.getElementById('cover-zone').classList.add('has-image');
            };
            reader.readAsDataURL(file);
        }

        function changeCover() {
            document.getElementById('cover-input-2').click();
        }

        function removeCover() {
            document.getElementById('cover-img').src = '';
            document.getElementById('cover-preview').classList.remove('show');
            document.getElementById('cover-zone').classList.remove('has-image');
            document.getElementById('cover-input').value = '';
            document.getElementById('cover-input-2').value = '';
        }

        // ─────────────────────────────────────────────────────────────────────────────
        // 5. Title helpers
        // ─────────────────────────────────────────────────────────────────────────────
        function autoResize(el) {
            el.style.height = '';
            el.style.height = el.scrollHeight + 'px';
        }

        function updateTitleCounter() {
            const len = document.getElementById('title-input').value.length;
            document.getElementById('title-counter').textContent = `${len} / 120`;
            // Auto-fill slug
            const slug = document.getElementById('title-input').value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .trim()
                .replace(/\s+/g, '-');
            if (!document.getElementById('slug-input').dataset.manual) {
                document.getElementById('slug-input').value = slug;
                document.getElementById('preview-slug').textContent = slug || 'article-slug';
            }
        }

        function updateExcerptCounter() {
            const len = document.getElementById('excerpt-input').value.length;
            document.getElementById('excerpt-counter').textContent = `${len} / 280`;
            document.getElementById('preview-desc').textContent =
                document.getElementById('excerpt-input').value || 'Meta description appears here...';
        }

        // Mark slug as manually edited
        document.getElementById('slug-input').addEventListener('input', function() {
            this.dataset.manual = 'true';
            document.getElementById('preview-slug').textContent = this.value || 'article-slug';
        });
        document.getElementById('seo-title').addEventListener('input', function() {
            document.getElementById('preview-title').textContent = this.value ||
                document.getElementById('title-input').value || 'Article Title';
        });

        // Init counters on load
        updateTitleCounter();
        updateExcerptCounter();
        autoResize(document.getElementById('title-input'));

        // ─────────────────────────────────────────────────────────────────────────────
        // 6. Status segmented control
        // ─────────────────────────────────────────────────────────────────────────────
        document.querySelectorAll('.status-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.status-pill').forEach(p => {
                    p.classList.remove('bg-primary', 'text-white');
                    p.classList.add('text-secondary', 'hover:bg-surface-container-low');
                });
                this.nextElementSibling.classList.add('bg-primary', 'text-white');
                this.nextElementSibling.classList.remove('text-secondary',
                    'hover:bg-surface-container-low');

                // Show/hide scheduled datetime
                document.getElementById('scheduled-datetime').classList.toggle('hidden', this
                    .value !== 'scheduled');
            });
        });

        // ─────────────────────────────────────────────────────────────────────────────
        // 7. SEO panel toggle
        // ─────────────────────────────────────────────────────────────────────────────
        function toggleSEO() {
            const panel = document.getElementById('seo-panel');
            const chevron = document.getElementById('seo-chevron');
            panel.classList.toggle('hidden');
            chevron.style.transform = panel.classList.contains('hidden') ? '' : 'rotate(180deg)';
        }

        // ─────────────────────────────────────────────────────────────────────────────
        // 8. Form submit
        // ─────────────────────────────────────────────────────────────────────────────
        function submitForm(status) {
            document.getElementById('form-status').value = status;
            document.getElementById('content-input').value = quill.root.innerHTML;
            document.getElementById('article-form').submit();
        }

        // ─────────────────────────────────────────────────────────────────────────────
        // 9. Auto-save (every 30 seconds or on change)
        // ─────────────────────────────────────────────────────────────────────────────
        let autoSaveTimer = null;

        function scheduleAutoSave() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(autoSave, 30_000);
        }

        // تعريف خارج الـ function عشان يتذكر الـ ID
        let currentArticleId = '{{ isset($article) ? $article->id : '' }}';

        async function autoSave() {
            const title = document.getElementById('title-input').value;
            const excerpt = document.getElementById('excerpt-input').value;
            const content = quill.root.innerHTML;

            if (!title && !content) return;

            setAutoSaveStatus('saving');

            try {
                // ✅ لو عندنا ID (من البداية أو من أول autosave) استخدم update endpoint
                const endpoint = currentArticleId ?
                    `/articles/${currentArticleId}/autosave` :
                    '{{ route('articles.autosave.new') }}';

                const res = await ajax.post(endpoint, {
                    title,
                    excerpt,
                    content,
                    status: 'draft',
                    reading_time: document.getElementById('reading-time-input').value,
                    category_id: document.getElementById('category-select').value,
                    slug: document.getElementById('slug-input').value,
                });

                const data = res.data;

                // ✅ أول مرة ينشئ مقال جديد — احفظ الـ ID وحدّث الـ form action
                if (!currentArticleId && data.article_id) {
                    currentArticleId = data.article_id;
                    document.getElementById('article-form').action =
                        `/articles/${currentArticleId}`;
                    // حدّث الـ method لـ PUT
                    document.querySelector('#article-form input[name="_method"]')?.remove();
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    document.getElementById('article-form').appendChild(methodInput);
                    document.getElementById('preview_btn').href = `/articles/${currentArticleId}/preview`;
                }

                setAutoSaveStatus('saved');
            } catch (err) {
                console.error('[Auto Save Error]', err.message);
                setAutoSaveStatus('error');
            }
        }

        function setAutoSaveStatus(state) {
            const statusEl = document.getElementById('autosave-status');
            const dot = document.getElementById('autosave-dot');
            const text = document.getElementById('autosave-text');
            statusEl.classList.remove('hidden');

            const states = {
                saving: {
                    dot: 'bg-yellow-400 animate-pulse',
                    text: 'Saving...'
                },
                saved: {
                    dot: 'bg-green-500',
                    text: 'Saved just now'
                },
                error: {
                    dot: 'bg-red-400',
                    text: 'Save failed'
                },
            };
            dot.className = `w-2 h-2 rounded-full ${states[state].dot}`;
            text.textContent = states[state].text;
        }

        // Auto-save every 30s automatically
        setInterval(autoSave, 30_000);

        // ─────────────────────────────────────────────────────────────────────────────
        // 10. AI Generation (summary & content)
        // ─────────────────────────────────────────────────────────────────────────────
        //         async function generateAI(type) {
        //             const title = document.getElementById('title-input').value;
        //             const content = quill.getText().trim();

        //             if (!title && !content) {
        //                 alert('Please write a title first.');
        //                 return;
        //             }

        //             const labelEl = document.getElementById(type === 'summary' ? 'ai-summary-label' :
        //                 'ai-content-label');
        //             labelEl.textContent = 'Generating...';
        //             labelEl.parentElement.disabled = true;
        //             labelEl.parentElement.classList.add('opacity-60');

        //             try {
        //                 // في generateAI function — استبدل الـ prompt كاملاً

        //                 const keywords = title.toLowerCase()
        //                     .replace(/[^a-z0-9\s]/g, '')
        //                     .split(' ')
        //                     .filter(w => w.length > 3)
        //                     .slice(0, 3);

        //                 const imageKeyword1 = encodeURIComponent(keywords[0] ?? 'technology');
        //                 const imageKeyword2 = encodeURIComponent(keywords[1] ?? 'knowledge');

        //                 const prompt = type === 'summary' ?
        //                     `You are an expert SEO content writer.

    // Write a compelling meta description for this article:
    // Title: "${title}"
    // Content preview: "${content.substring(0, 500)}"

    // Requirements:
    // - Exactly 150-160 characters (count carefully)
    // - Start with an action verb or power word
    // - Include the main keyword naturally
    // - Create urgency or curiosity
    // - No quotes, no markdown, plain text only
    // - Active voice, present tense

    // Return ONLY the summary text, nothing else.`

        //                     :
        //                     `You are a senior SEO content strategist and professional writer for "Ink & Paper", a premium publishing platform trusted by 50,000+ readers.

    // Write a comprehensive, SEO-optimized article about: "${title}"

    // TARGET AUDIENCE: Educated, curious readers who want in-depth, reliable information.
    // PRIMARY KEYWORD: "${title}"
    // SECONDARY KEYWORDS: "${keywords.join('", "')}"

    // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // REQUIRED STRUCTURE (HTML only, no markdown):
    // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

    // <h2>[Attention-grabbing introduction title with power word]</h2>
    // [Hook: Start with a shocking statistic, provocative question, or surprising fact]
    // [2-3 paragraphs: Define the topic, why it matters NOW, and what the reader will gain]
    // [Transition sentence leading to first section]

    // <img src="https://picsum.photos/seed/${imageKeyword1}1/1200/600" alt="[descriptive alt text about ${title}]">

    // <h2>[Section 1: Core Concepts — use relevant title]</h2>
    // [Deep explanation with real-world context]
    // [Use <strong> for KEY TERMS and important statistics]
    // [Include 2-3 specific examples with details]
    // [Add a relevant data point: <strong>X%</strong> of [context] <a href="#sources">[Source]</a>]

    // <h2>[Section 2: Deeper Analysis — use relevant title]</h2>
    // [Explore nuances, challenges, or lesser-known aspects]
    // [Include an expert quote:]
    // <blockquote>"[Relevant expert quote that adds authority to the topic]" — [Expert Name, Title/Organization]</blockquote>
    // [Continue with 2-3 paragraphs expanding on the quote's implications]

    // <h2>[Section 3: Practical Application — use relevant title]</h2>
    // [How readers can apply this knowledge]
    // <img src="https://picsum.photos/seed/${imageKeyword2}2/1200/500" alt="[descriptive alt text related to practical application]">
    // [Step-by-step or scenario-based explanation]
    // [Include a comparison or contrast to deepen understanding]

    // <h2>[Section 4: Current Trends & Future Outlook]</h2>
    // [What's happening NOW in this space]
    // [What experts predict for the future]
    // [Statistics or research findings: <strong>X</strong> [metric] by [year] <a href="#sources">[Research Org]</a>]

    // <h2>Key Takeaways</h2>
    // <ul>
    // <li><strong>[Takeaway 1]:</strong> [One clear sentence explanation]</li>
    // <li><strong>[Takeaway 2]:</strong> [One clear sentence explanation]</li>
    // <li><strong>[Takeaway 3]:</strong> [One clear sentence explanation]</li>
    // <li><strong>[Takeaway 4]:</strong> [One clear sentence explanation]</li>
    // <li><strong>[Takeaway 5]:</strong> [One clear sentence explanation]</li>
    // </ul>

    // <h2>Conclusion</h2>
    // [Synthesize the main arguments — 2 paragraphs]
    // [End with an inspiring thought that connects back to the opening hook]
    // [Strong call-to-action: invite readers to comment, share, or explore related articles]

    // <h2>Sources & Further Reading</h2>
    // <ul id="sources">
    // <li><a href="#" rel="noopener">[Source 1 — relevant organization or publication]</a></li>
    // <li><a href="#" rel="noopener">[Source 2 — relevant research or study]</a></li>
    // <li><a href="#" rel="noopener">[Source 3 — expert or authority in this field]</a></li>
    // </ul>

    // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // STRICT RULES — FOLLOW EXACTLY:
    // ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ✅ Return ONLY raw HTML — no \`\`\`html, no markdown, no explanations
        //     ✅ Minimum 1,000 words of actual content
        //     ✅ Every <h2> must have at least 2 substantial paragraphs
        //     ✅ Use <strong> for statistics, key terms, and important phrases
        //     ✅ Replace ALL bracketed placeholders with REAL, specific content
        //     ✅ Images must use EXACTLY this format (no changes to URL structure):
        //        <img src="https://picsum.photos/seed/KEYWORD/1200/500" alt="Descriptive alt text">
        //     ✅ Alt text must describe what the image represents in context
        //     ✅ Sources section is REQUIRED — use real organization names even if URLs are placeholder #
        //     ✅ NO empty paragraphs, NO <p><br></p>, NO filler content
        //     ✅ Every sentence must add value — remove anything generic`;

    //                 const res = await ajax.post('{{ route('ai.article.generate') }}', {
    //                     prompt,
    //                 })

    //                 const data = res.data;

    //                 if (type === 'summary') {
    //                     document.getElementById('excerpt-input').value = data.result;
    //                     updateExcerptCounter();
    //                 } else {
    //                     // Insert generated content into Quill
    //                     quill.root.innerHTML = '';
    //                     quill.clipboard.dangerouslyPasteHTML(0, data.result.replace(/\n/g, '<br>'));
    //                 }

    //             } catch {
    //                 alert('AI generation failed. Please try again.');
    //             } finally {
    //                 labelEl.textContent = type === 'summary' ? 'Generate with AI' : 'Write with AI';
    //                 labelEl.parentElement.disabled = false;
    //                 labelEl.parentElement.classList.remove('opacity-60');
    //             }
    //         }
    // في editor.blade.php — استبدل الـ generateAI function كاملاً

    async function generateAI(type) {
        const title = document.getElementById('title-input').value.trim();
        const content = quill.getText().trim();

        if (!title) {
            alert('Please write a title first.');
            return;
        }

        const labelEl = document.getElementById(type === 'summary' ? 'ai-summary-label' : 'ai-content-label');
        const btn = labelEl.closest('button');

        // ── Loading state ─────────────────────────────────────────────────────
        labelEl.textContent = type === 'summary' ? 'Generating...' : 'Writing...';
        btn.disabled = true;
        btn.classList.add('opacity-60');

        try {
            const body = {
                type,
                title,
            };

            if (type === 'summary') {
                body.content = quill.root.innerHTML;
            }

            const res = await ajax.post('{{ route('ai.article.generate') }}', body);

            const data = res.data;

            if (type === 'summary') {
                // ── Summary: just fill the excerpt field ───────────────────────
                document.getElementById('excerpt-input').value = data.result ?? '';
                updateExcerptCounter();

            } else {
                // ── Full article: fill ALL fields from structured response ──────

                // 1. Content → Quill
                if (data.content) {
                    quill.root.innerHTML = '';
                    quill.clipboard.dangerouslyPasteHTML(0, data.content);
                }

                // 2. Summary → excerpt (only if empty)
                if (data.summary && !document.getElementById('excerpt-input').value) {
                    document.getElementById('excerpt-input').value = data.summary;
                    updateExcerptCounter();
                }

                // 3. SEO fields (open SEO panel first)
                if (data.seo_title || data.seo_description || data.slug) {
                    // Open SEO panel if closed
                    const seoPanel = document.getElementById('seo-panel');
                    if (seoPanel.classList.contains('hidden')) toggleSEO();

                    if (data.seo_title) {
                        document.getElementById('seo-title').value = data.seo_title;
                        document.getElementById('seo-title-counter').textContent =
                            data.seo_title.length + ' / 60';
                        document.getElementById('preview-title').textContent = data.seo_title;
                    }

                    if (data.seo_description) {
                        document.getElementById('seo-description').value = data.seo_description;
                        document.getElementById('seo-desc-counter').textContent =
                            data.seo_description.length + ' / 160';
                        document.getElementById('preview-desc').textContent = data.seo_description;
                    }

                    if (data.seo_keywords) {
                        document.getElementById('seo-keywords').value = data.seo_keywords;
                        document.getElementById('seo-keywords-counter').textContent =
                            data.seo_keywords.length + ' / 160';
                    }

                    if (data.slug) {
                        document.getElementById('slug-input').value = data.slug;
                        document.getElementById('preview-slug').textContent = data.slug;
                        document.getElementById('slug-input').dataset.manual = 'true';
                    }
                }

                // 4. Suggested tags → TomSelect
                if (data.suggested_tags?.length && tagsSelect) {
                    data.suggested_tags.slice(0, 5).forEach(tag => {
                        // Add option if not exists
                        if (!tagsSelect.options[tag]) {
                            tagsSelect.addOption({
                                value: tag,
                                text: tag
                            });
                        }
                        tagsSelect.addItem(tag, true);
                    });
                    document.getElementById('tag-counter').textContent =
                        `${data.suggested_tags.slice(0, 5).length} / 5`;
                }

                // 5. Reading time
                if (data.reading_time) {
                    document.getElementById('reading-time-input').value = data.reading_time;
                    document.getElementById('word-count').textContent =
                        `${data.word_count ?? 0} words · ~${data.reading_time} min read`;
                    }

                    // 6. Trigger autosave
                    scheduleAutoSave();
                }

            } catch (err) {
                console.error('[AI Error]', err);
                alert('AI generation failed. Please try again.');
            } finally {
                labelEl.textContent = type === 'summary' ? 'Generate with AI' : 'Write with AI';
                btn.disabled = false;
                btn.classList.remove('opacity-60');
            }
        }
    </script>
@endpush
