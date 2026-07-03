@extends('layouts.public')

@section('title', sprintf('%s - Tag Archive - Ink & Paper', $tag->name))

@section('page-content')
    <div class="max-w-container-max mx-auto px-gutter">
        <!-- Tag Header -->
        <header class="mb-section-gap">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-outline-variant pb-8">
                <div>
                    <h1 class="font-display-lg text-display-lg text-on-surface mb-2">#{{ $tag->name }}</h1>
                    <p class="text-on-surface-variant font-ui-label text-ui-label">{{ $articles->total() }} Curated Articles
                        • Updated {{ $tag->updated_at ? $tag->updated_at->diffForHumans() : 'recently' }}</p>
                </div>
                <!-- Sorting Options (no-op links; can be wired later) -->
                <div class="flex items-center gap-6 font-ui-label text-ui-label text-on-surface-variant">
                    <a href="?sort=latest" class="pb-1 transition-all">Latest</a>
                    <a href="?sort=top" class="hover:text-on-surface pb-1 transition-all">Top</a>
                    <a href="?sort=oldest" class="hover:text-on-surface pb-1 transition-all">Oldest</a>
                </div>
            </div>
        </header>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <!-- Articles Feed (720px focused column) -->
            <section class="md:col-span-8 flex flex-col gap-12">
                @forelse($articles as $article)
                    <article class="flex flex-col gap-6 group">
                        <div class="aspect-[16/9] w-full bg-surface-container-low rounded-lg overflow-hidden ink-border">
                            @if ($article->cover_url)
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    src="{{ $article->cover_url }}" alt="{{ $article->title }}" />
                            @else
                                <div class="w-full h-full bg-surface-container-high"></div>
                            @endif
                        </div>
                        <div class="max-w-article-max">
                            <div class="flex items-center gap-3 mb-3">
                                <img class="w-6 h-6 rounded-full"
                                    src="{{ optional($article->author->profile)->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($article->author->name) . '&background=6750A4&color=fff&size=128' }}" />
                                <span class="font-metadata text-metadata text-secondary">{{ $article->author->name }} •
                                    {{ $article->published_at ? $article->published_at->format('d M Y') : '' }}</span>
                            </div>
                            <h2
                                class="font-headline-md text-headline-md text-on-surface mb-3 group-hover:text-primary transition-colors">
                                {{ $article->title }}</h2>
                            <p class="text-on-surface-variant font-body-md line-clamp-3">{{ $article->excerpt }}</p>
                            <div class="mt-4 flex items-center gap-4">
                                <a href="{{ $article->url }}"
                                    class="font-ui-label text-ui-label text-primary flex items-center gap-1">Read Article
                                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span></a>
                                <span
                                    class="material-symbols-outlined text-secondary cursor-pointer hover:text-primary transition-all">bookmark</span>
                            </div>
                        </div>
                    </article>
                    <div class="h-px bg-outline-variant w-full"></div>
                @empty
                    <div class="rounded-xl border border-outline-variant bg-surface-container-low p-8 text-center">
                        <p class="font-ui-label text-ui-label text-secondary mb-3">No articles found for this tag.</p>
                        <p class="text-on-surface-variant">Try exploring related tags or check back later.</p>
                    </div>
                @endforelse

                @if ($articles->hasPages())
                    <div class="flex items-center justify-center gap-4 mt-8">
                        {{ $articles->links() }}
                    </div>
                @endif
            </section>
            <!-- Sidebar -->
            <aside class="md:col-span-4 flex flex-col gap-12">
                <!-- Related Tags Section -->
                <div class="bg-surface-container-lowest p-6 rounded-lg ink-border paper-shadow">
                    <h3 class="font-ui-label text-ui-label font-bold text-on-surface mb-6 uppercase tracking-wider">Related
                        Tags
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($relatedTags as $rt)
                            <a class="px-3 py-1 bg-surface ink-border rounded-full font-metadata text-metadata hover:border-primary hover:text-primary transition-all"
                                href="{{ route('tags.show', $rt->slug) }}">#{{ $rt->name }}</a>
                        @endforeach
                    </div>
                </div>
                <!-- Trending Topics (Top articles in this tag) -->
                <div class="bg-surface-container-lowest p-6 rounded-lg ink-border paper-shadow">
                    <h3 class="font-ui-label text-ui-label font-bold text-on-surface mb-6 uppercase tracking-wider">Trending
                        in
                        #{{ $tag->name }}</h3>
                    <ul class="flex flex-col gap-6">
                        @foreach ($trending as $i => $t)
                            <li class="flex flex-col gap-1 cursor-pointer group">
                                <span
                                    class="text-metadata font-metadata text-secondary">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <a href="{{ $t->url }}"
                                    class="text-ui-label font-ui-label font-semibold text-on-surface group-hover:text-primary">{{ $t->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Newsletter Subscription -->
                <div class="bg-primary-container p-6 rounded-lg text-on-primary">
                    <h3 class="font-headline-md text-[20px] mb-2">Curated Quiet</h3>
                    <p class="font-ui-label text-ui-label text-primary-fixed opacity-90 mb-6">Weekly insights on
                        minimalism,
                        delivered straight to your inbox.</p>
                    <div class="flex flex-col gap-3">
                        <input
                            class="bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-white/50"
                            placeholder="email@address.com" type="email" />
                        <button
                            class="bg-white text-primary font-ui-button text-ui-button py-2 rounded-lg hover:bg-surface transition-all">Subscribe</button>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
