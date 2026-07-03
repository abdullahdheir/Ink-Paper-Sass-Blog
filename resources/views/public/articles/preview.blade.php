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
                        </div>
                        <p class="font-metadata text-metadata text-secondary">
                            {{ $article->published_at ? $article->published_at?->format('M d Y') . ' .' : '' }}
                            {{ $article->reading_time }} min read</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button
                        class="cursor-pointer material-symbols-outlined text-secondary
                        hover:text-primary transition-colors">share</button>
                </div>
            </div>
        </header>
        <!-- Content -->
        <div class="space-y-8 mb-8 prose-article">
            {!! $article->content !!}
        </div>
    </article>
@endsection
