@extends('layouts.public')

@section('title', 'Author Profile - Ink & Paper')

@section('page-content')
    <div class="max-w-container-max mx-auto px-gutter">
        <!-- Author Profile Hero Section -->
        <section class="flex flex-col md:flex-row gap-12 items-start mb-16">
            <div class="relative group">
                <div class="w-40 h-40 md:w-56 md:h-56 rounded-xl overflow-hidden border border-outline-variant bg-white">
                    <img class="w-full h-full object-cover"
                        data-alt="A professional studio portrait of a confident female author with a warm smile, set against a clean minimalist light gray background. She is wearing a modern structured charcoal blazer, embodying a sharp and intellectual aesthetic. The lighting is soft and diffused, highlighting natural skin textures and reflecting the sophisticated and focused brand identity of the platform."
                        src="{{ $author->avatar }}" />
                </div>
                @if ($author->is_verified)
                    <div class="absolute -bottom-2 -right-2 bg-primary-container text-white p-2 rounded-lg shadow-lg">
                        <span class="material-symbols-outlined" data-icon="verified"
                            style="font-variation-settings: 'FILL' 1;">verified</span>
                    </div>
                @endif
            </div>
            <div class="flex-1 space-y-6">
                <div>
                    <h1 class="font-display-lg text-display-lg text-on-surface mb-2">{{ $author->name }}</h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-article-max">
                        {{ $author->profile->bio }}</p>
                </div>
                <div class="flex flex-wrap gap-4">
                    @if ($author->profile->website)
                        <a class="flex items-center gap-2 text-secondary hover:text-primary transition-colors font-ui-label text-ui-label"
                            href="{{ $author->profile->website }}">
                            <span class="material-symbols-outlined text-[18px]" data-icon="link">link</span>
                            <span>{{ $author->profile->website }}</span>
                        </a>
                    @endif
                    <a class="flex items-center gap-1 text-secondary hover:text-primary transition-colors font-ui-label text-ui-label"
                        href="#">
                        <span class="material-symbols-outlined text-[18px]"
                            data-icon="alternate_email">alternate_email</span>
                        <span> {{ $author->username }}</span>
                    </a>
                    {{-- <a class="flex items-center gap-2 text-secondary hover:text-primary transition-colors font-ui-label text-ui-label"
                        href="#">
                        <span class="material-symbols-outlined text-[18px]" data-icon="location_on">location_on</span>
                        <span>Berlin, Germany</span>
                    </a> --}}
                </div>
                <div class="flex gap-4 pt-4 border-t border-outline-variant">
                    <x-follow-button :author="$author" />
                    <button
                        class="cursor-pointer border border-on-surface text-on-surface px-8 py-3 rounded-lg font-ui-button text-ui-button hover:bg-surface-container transition-all"
                        onclick="share({
        title: '{{ addslashes($author->name) }} on {{ config('app.name') }}',
        text:  '{{ addslashes($author->profile->bio ?? '') }}',
        url:   '{{ route('authors.profile', $author->username) }}'
    })">
                        Share Profile
                    </button>
                </div>
            </div>
        </section>
        <!-- Stats Bar -->
        <section class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-section-gap">
            <div class="bg-white border border-outline-variant p-6 rounded-lg text-center">
                <span
                    class="block font-display-lg text-display-lg text-primary">{{ $author->stats->followers_count ?? 0 }}</span>
                <span class="font-ui-label text-ui-label text-secondary uppercase tracking-wider">Followers</span>
            </div>
            <div class="bg-white border border-outline-variant p-6 rounded-lg text-center">
                <span
                    class="block font-display-lg text-display-lg text-on-surface">{{ $author->stats->total_views ?? 0 }}</span>
                <span class="font-ui-label text-ui-label text-secondary uppercase tracking-wider">Total Views</span>
            </div>
            <div class="bg-white border border-outline-variant p-6 rounded-lg text-center">
                <span
                    class="block font-display-lg text-display-lg text-on-surface">{{ $author->stats->articles_count ?? 0 }}</span>
                <span class="font-ui-label text-ui-label text-secondary uppercase tracking-wider">Articles</span>
            </div>
            <div class="bg-white border border-outline-variant p-6 rounded-lg text-center">
                <span
                    class="block font-display-lg text-display-lg text-on-surface">{{ $author->stats->average_rating ?? 0 }}</span>
                <span class="font-ui-label text-ui-label text-secondary uppercase tracking-wider">Avg Rating</span>
            </div>
        </section>
        <div class="flex items-center justify-between mb-8">
            <h2 class="font-headline-md text-headline-md text-on-surface">Published Articles</h2>
            {{-- <div class="flex gap-2">
                <button
                    class="p-2 border border-outline-variant rounded-lg text-on-surface-variant hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined" data-icon="grid_view">grid_view</span>
                </button>
                <button class="p-2 border border-outline-variant rounded-lg text-primary bg-surface-container">
                    <span class="material-symbols-outlined" data-icon="list">list</span>
                </button>
            </div> --}}
        </div>
        <!-- Articles Feed (Editorial List) -->
        <div class="space-y-12">
            @forelse ($articles as $article)
                <x-article :article="$article" />
                <div class="h-px bg-outline-variant"></div>
            @empty
                <h2 class="text-center mb-5">The author has not published any articles yet.</h2>
            @endforelse
        </div>
        <!-- Pagination/Load More -->
        {{ $articles->links() }}
    </div>
@endsection
