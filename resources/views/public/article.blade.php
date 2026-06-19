@extends('layouts.public')

@section('title', 'Article - Ink & Paper')

@section('page-content')
    <article class="mx-auto max-w-article-max">
        <!-- Headline -->
        <header class="mb-12">
            <h1 class="font-display-lg text-display-lg mb-8 text-on-surface">{{ $article->title }}</h1>
            <!-- Author Bio -->
            <div class="flex items-center justify-between py-6 border-y border-outline-variant">
                <div class="flex items-center gap-4">
                    <img class="w-12 h-12 rounded-full grayscale" src="{{ $article->author->avatar }}" />
                    <div>
                        <div class="flex items-center gap-2">
                            <span
                                class="font-ui-label text-ui-label font-bold text-on-surface">{{ $article->author->name }}</span>
                            <span class="text-secondary-fixed-dim">•</span>
                            <button data-following="{{ $article->author->is_followed_by_auth_user ? 'true' : 'false' }}"
                                data-username="{{ $article->author->username }}" onclick="toggleFollow(this,false)"
                                class="text-primary font-ui-label text-ui-label font-semibold hover:underline cursor-pointer">
                                <span class="follow-label">
                                    {{ $article->author->is_followed_by_auth_user ? 'Following' : 'Follow' }}
                                </span>
                            </button>
                        </div>
                        <p class="font-metadata text-metadata text-secondary">
                            {{ $article->published_at ? $article->published_at?->format('M d YYYY') . ' .' : '' }}
                            {{ $article->reading_time }} min read</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button
                        onclick="share({
        title: '{{ addslashes($article->title) }} on {{ config('app.name') }}',
        text:  '{{ addslashes($article->excerpt) }}',
        url:   '{{ route('articles.show', $article->slug) }}'
    })"
                        class="cursor-pointer material-symbols-outlined text-secondary
                        hover:text-primary transition-colors">share</button>
                </div>
            </div>
        </header>
        <!-- Content -->
        <div class="space-y-8 mb-8">
            {!! $article->content !!}
        </div>
    </article>
    </main>
    <!-- Floating Engagement Bar -->
    <div class="fixed bottom-10 left-1/2 -translate-x-1/2 z-40">
        <div
            class="flex items-center gap-6 px-6 py-3 bg-white rounded-full border border-outline-variant shadow-[0_20px_30px_rgba(26,26,26,0.05)] backdrop-blur-sm">
            <div class="flex items-center gap-2 group cursor-pointer">
                <span
                    class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">favorite</span>
                <span
                    class="font-ui-label text-ui-label text-secondary group-hover:text-primary">{{ Number::abbreviate($article->likes_count) }}</span>
            </div>
            <div class="w-px h-6 bg-outline-variant"></div>
            <div class="flex items-center gap-2 group cursor-pointer">
                <span
                    class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">chat_bubble</span>
                <span
                    class="font-ui-label text-ui-label text-secondary group-hover:text-primary">{{ Number::abbreviate($article->comments_count) }}</span>
            </div>
            <div class="w-px h-6 bg-outline-variant"></div>
            <button
                class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors">bookmark</button>
            <button
                onclick="share({
        title: '{{ addslashes($article->title) }} on {{ config('app.name') }}',
        text:  '{{ addslashes($article->excerpt) }}',
        url:   '{{ route('articles.show', $article->slug) }}'
    })"
                class="cursor-pointer material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors">ios_share</button>
        </div>
    </div>
@endsection
