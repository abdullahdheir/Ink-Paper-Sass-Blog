@extends('layouts.public')

@section('title', 'Search Results - Ink & Paper')

@section('page-content')
    <div class="pb-section-gap px-gutter max-w-container-max mx-auto">
        <!-- Search Header -->
        <section class="mb-12">
            <p class="text-metadata font-metadata text-secondary mb-2 uppercase tracking-widest">Search results</p>
            <h1 class="font-display-lg text-display-lg text-on-surface mb-6 italic">
                @if ($query !== '')
                    @php
                        $resultCount = $articleResults->total() + $authorResults->total() + $tagResults->total();
                    @endphp
                    Showing {{ $resultCount }} result{{ $resultCount === 1 ? '' : 's' }} for <span
                        class="text-primary not-italic">"{{ $query }}"</span>
                @else
                    Find the stories, authors, and ideas you care about.
                @endif
            </h1>
            <div class="flex gap-8 border-b border-outline-variant">
                @foreach ([
            'all' => ['label' => 'All Results', 'count' => $articleResults->total() + $authorResults->total() + $tagResults->total()],
            'articles' => ['label' => 'Articles', 'count' => $articleResults->total()],
            'authors' => ['label' => 'Authors', 'count' => $authorResults->total()],
            'tags' => ['label' => 'Tags', 'count' => $tagResults->total()],
        ] as $tabKey => $tabData)
                    <a href="{{ route('search', ['q' => $query, 'type' => $tabKey]) }}"
                        class="pb-4 font-ui-label text-ui-label transition-colors {{ $type === $tabKey ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-on-surface' }}">
                        {{ $tabData['label'] }}
                        <span
                            class="ml-2 text-metadata font-metadata text-on-surface-variant">({{ $tabData['count'] }})</span>
                    </a>
                @endforeach
            </div>
        </section>
        <!-- Main Layout: Sidebar & Content -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <!-- Main Content Area -->
            <div class="md:col-span-8 space-y-12">
                @if ($type === 'all' || $type === 'articles')
                    <section class="space-y-8">
                        <div class="flex items-center justify-between">
                            <h2 class="font-ui-label text-ui-label font-bold text-on-surface">Articles</h2>
                            <span class="text-metadata font-metadata text-secondary">{{ $articleResults->total() }}
                                result{{ $articleResults->total() === 1 ? '' : 's' }}</span>
                        </div>

                        @forelse($articleResults as $article)
                            <x-article :article="$article" />
                            <div class="border-t border-outline-variant opacity-50"></div>
                        @empty
                            <div class="rounded-xl border border-outline-variant bg-surface-container-low p-8 text-center">
                                <p class="font-ui-label text-ui-label text-secondary mb-3">No articles found.</p>
                                <p class="text-on-surface-variant">Try a different keyword or choose another tab.</p>
                            </div>
                        @endforelse

                        @if ($articleResults->hasPages())
                            <div class="flex items-center justify-center gap-4 pt-12">
                                {{ $articleResults->links() }}
                            </div>
                        @endif
                    </section>
                @endif

                @if ($type === 'all' || $type === 'authors')
                    <section class="space-y-8">
                        <div class="flex items-center justify-between">
                            <h2 class="font-ui-label text-ui-label font-bold text-on-surface">Authors</h2>
                            <span class="text-metadata font-metadata text-secondary">{{ $authorResults->total() }}
                                result{{ $authorResults->total() === 1 ? '' : 's' }}</span>
                        </div>

                        @forelse($authorResults as $author)
                            <article
                                class="group rounded-3xl border border-outline-variant p-6 bg-surface-container-low transition hover:border-primary">
                                <div class="flex items-center gap-4">
                                    <img class="w-20 h-20 rounded-full object-cover"
                                        src="{{ optional($author->profile)->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($author->name) . '&background=6750A4&color=fff&size=128' }}"
                                        alt="{{ $author->name }}" />
                                    <div class="flex-1">
                                        <a href="{{ route('authors.profile', ['author' => $author->username]) }}"
                                            class="font-headline-md text-headline-md text-on-surface hover:text-primary transition-colors">{{ $author->name }}</a>
                                        <p class="text-metadata font-metadata text-secondary mt-2 line-clamp-2">
                                            {{ optional($author->profile)->bio ?? 'No bio available yet.' }}</p>
                                        <div class="mt-3 flex flex-wrap gap-3 text-xs text-secondary">
                                            <span>{{ $author->published_articles_count ?? 0 }} published articles</span>
                                            <span>{{ optional($author->stats)->followers_count ?? 0 }} followers</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="rounded-xl border border-outline-variant bg-surface-container-low p-8 text-center">
                                <p class="font-ui-label text-ui-label text-secondary mb-3">No authors found.</p>
                                <p class="text-on-surface-variant">Try a different keyword or choose another tab.</p>
                            </div>
                        @endforelse

                        @if ($authorResults->hasPages())
                            <div class="flex items-center justify-center gap-4 pt-12">
                                {{ $authorResults->links() }}
                            </div>
                        @endif
                    </section>
                @endif

                @if ($type === 'all' || $type === 'tags')
                    <section class="space-y-8">
                        <div class="flex items-center justify-between">
                            <h2 class="font-ui-label text-ui-label font-bold text-on-surface">Tags</h2>
                            <span class="text-metadata font-metadata text-secondary">{{ $tagResults->total() }}
                                result{{ $tagResults->total() === 1 ? '' : 's' }}</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @forelse($tagResults as $tag)
                                <a href="{{ route('tag.archive', $tag->slug) }}"
                                    class="group block rounded-3xl border border-outline-variant p-6 bg-surface-container-low hover:border-primary transition-colors">
                                    <div class="flex items-center justify-between gap-4 mb-4">
                                        <span
                                            class="font-headline-sm text-headline-sm text-on-surface">#{{ $tag->name }}</span>
                                        <span
                                            class="text-metadata font-metadata text-secondary">{{ $tag->articles_count ?? $tag->articles()->count() }}
                                            articles</span>
                                    </div>
                                    <p class="text-on-surface-variant text-body-md line-clamp-3">Browse stories tagged with
                                        {{ $tag->name }}.</p>
                                </a>
                            @empty
                                <div
                                    class="rounded-xl border border-outline-variant bg-surface-container-low p-8 text-center col-span-full">
                                    <p class="font-ui-label text-ui-label text-secondary mb-3">No tags found.</p>
                                    <p class="text-on-surface-variant">Try a different keyword or choose another tab.</p>
                                </div>
                            @endforelse
                        </div>

                        @if ($tagResults->hasPages())
                            <div class="flex items-center justify-center gap-4 pt-12">
                                {{ $tagResults->links() }}
                            </div>
                        @endif
                    </section>
                @endif
            </div>
            <!-- Sidebar Section -->
            <aside class="md:col-span-4 space-y-12">
                <!-- Top Authors -->
                <section>
                    <h3
                        class="font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider mb-6 pb-2 border-b border-outline">
                        Top Authors</h3>
                    <div class="space-y-6">
                        @foreach ($topAuthors as $author)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img alt="{{ $author->name }}"
                                        class="w-10 h-10 rounded-full bg-surface-container-high object-cover"
                                        src="{{ optional($author->profile)->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($author->name) . '&background=6750A4&color=fff&size=128' }}" />
                                    <div>
                                        <p class="font-ui-label text-ui-label text-on-surface font-bold">
                                            {{ $author->name }}</p>
                                        <p class="text-metadata font-metadata text-secondary">
                                            {{ $author->published_articles_count ?? 0 }} articles</p>
                                    </div>
                                </div>
                                <a href="{{ route('authors.profile', ['author' => $author->username]) }}"
                                    class="text-primary hover:underline font-ui-label text-metadata font-bold">View</a>
                            </div>
                        @endforeach
                    </div>
                </section>
                <!-- Related Tags -->
                <section>
                    <h3
                        class="font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider mb-6 pb-2 border-b border-outline">
                        Related Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($relatedTags as $tag)
                            <a class="px-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-ui-label font-ui-label text-on-surface-variant hover:border-primary hover:text-primary transition-all"
                                href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </section>
                <!-- Newsletter Card -->
                <section class="bg-primary-container p-8 rounded-lg text-on-primary">
                    <h3 class="font-headline-md text-headline-md mb-4 leading-tight">Master the Art of Focus.</h3>
                    <p class="font-body-md text-body-md opacity-90 mb-6">Join 15,000+ creators receiving our weekly
                        editorial on
                        design and deep work.</p>
                    <div class="space-y-3">
                        <input
                            class="w-full px-4 py-3 rounded border-none text-on-surface font-ui-label focus:ring-2 focus:ring-on-primary-container"
                            placeholder="Email address" type="email" />
                        <button
                            class="w-full py-3 bg-on-surface text-surface font-ui-button text-ui-button rounded hover:bg-opacity-90 transition-colors">Subscribe
                            Now</button>
                    </div>
                </section>
            </aside>
        </div>
    </div>
@endsection
