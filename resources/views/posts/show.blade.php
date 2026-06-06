@extends('layouts.dashboard')

@section('title', $post->title . ' - Ink & Paper')

@section('page-content')
    <!-- Article Header -->
    <header class="mb-12">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-4">{{ $post->title }}</h1>
        <div class="flex items-center gap-4 text-on-surface-variant">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">person</span>
                <span class="font-metadata text-metadata">Author</span>
            </div>
            <div class="h-4 w-[1px] bg-outline-variant/50"></div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">calendar_today</span>
                <span class="font-metadata text-metadata">{{ $post->created_at->format('M d, Y') }}</span>
            </div>
            @if ($post->category)
                <div class="h-4 w-[1px] bg-outline-variant/50"></div>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">category</span>
                    <span class="font-metadata text-metadata">{{ $post->category->name }}</span>
                </div>
            @endif
        </div>
    </header>

    <!-- Article Content -->
    <article class="font-body-lg text-body-lg text-on-surface leading-relaxed space-y-6">
        {!! $post->content !!}
    </article>

    <!-- Article Actions -->
    <div class="mt-12 pt-8 border-t border-outline-variant">
        <div class="flex items-center justify-between">
            <a href="{{ route('posts.edit', $post->id) }}" class="flex items-center gap-2 text-primary hover:underline">
                <span class="material-symbols-outlined">edit</span>
                Edit Post
            </a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center gap-2 text-error hover:underline"
                    onclick="return confirm('Are you sure you want to delete this post?')">
                    <span class="material-symbols-outlined">delete</span>
                    Delete Post
                </button>
            </form>
        </div>
    </div>
@endsection
