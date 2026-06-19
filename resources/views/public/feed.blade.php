@extends('layouts.public')

@section('title', 'Feed - Ink & Paper')

@section('page-content')
    <div class="pb-section-gap max-w-container-max mx-auto px-gutter grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Left Sidebar: Navigation & Tags -->
        <aside class="hidden md:block md:col-span-2 space-y-8">
            <div class="space-y-4">
                <h3 class="font-ui-label text-ui-label uppercase tracking-widest text-secondary font-bold">Discover</h3>
                <ul class="space-y-2">
                    <li><a class="flex items-center gap-3 text-primary font-bold font-ui-label text-ui-label py-1"
                            href="#"><span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">explore</span>Explore</a></li>
                    <li><a class="flex items-center gap-3 text-on-surface-variant hover:text-primary transition-colors font-ui-label text-ui-label py-1"
                            href="#"><span class="material-symbols-outlined">trending_up</span>Popular</a></li>
                    <li><a class="flex items-center gap-3 text-on-surface-variant hover:text-primary transition-colors font-ui-label text-ui-label py-1"
                            href="#"><span class="material-symbols-outlined">history</span>Recent</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="font-ui-label text-ui-label uppercase tracking-widest text-secondary font-bold">Your Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @forelse($trending_tags as $tag)
                        <a class="px-3 py-1 bg-surface-container border border-outline-variant rounded-full font-metadata text-metadata hover:bg-outline-variant transition-colors"
                            href="#">{{ $tag->name }}</a>
                    @empty
                        <p class="text-secondary font-metadata text-metadata">No tags available yet.</p>
                    @endforelse
                </div>
            </div>
        </aside>
        <!-- Center Feed -->
        <section class="col-span-1 md:col-span-7 space-y-12">
            @forelse($articles as $index => $article)
                @if ($index === 0)
                    <!-- Featured Article (Bento Style) -->
                    <article
                        class="group border border-outline-variant rounded-xl overflow-hidden bg-white hover:border-primary transition-colors duration-300">
                        <div class="aspect-video overflow-hidden bg-surface-container flex items-center justify-center">
                            <img src="{{ $article->cover_image_url }}" alt="{{ $article->title }}"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="p-8 space-y-4">
                            <div class="flex items-center gap-3 font-metadata text-metadata text-secondary">
                                <span
                                    class="bg-primary-container text-on-primary px-2 py-0.5 rounded font-bold uppercase tracking-wider">Featured</span>
                                <span>•</span>
                                <span>{{ $article->created_at->format('M d, Y') }}</span>
                                <span>•</span>
                                <span>{{ \Illuminate\Support\Str::wordCount(strip_tags($article->content)) }} min
                                    read</span>
                            </div>
                            <h2
                                class="font-headline-md text-headline-md text-on-surface leading-tight group-hover:text-primary transition-colors">
                                <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                            </h2>
                            <p class="text-on-surface-variant font-body-md text-body-md line-clamp-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 200) }}
                            </p>
                            <div class="flex items-center justify-between pt-4 border-t border-outline-variant">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-surface-container border border-outline-variant overflow-hidden flex items-center justify-center">
                                        <img src="{{ $article->author->avatar }}"
                                            alt="{{ $article->author->name ?? 'Author' }}"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div>
                                        <p class="font-ui-label text-ui-label font-bold text-on-surface">
                                            {{ $article->author->name ?? 'Author' }}</p>
                                        <p class="font-metadata text-metadata text-secondary">
                                            {{ $article->category ? $article->category->name : 'Uncategorized' }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="text-primary p-2 rounded-full hover:bg-primary-container/10 transition-colors">
                                    <span class="material-symbols-outlined">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @else
                    <!-- Regular Article -->
                    <x-article :article="$article" />
                @endif
            @empty
                <div class="text-center py-12">
                    <span class="material-symbols-outlined text-6xl text-on-surface-variant mb-4">feed</span>
                    <p class="text-on-surface-variant font-body-md">No articles yet. Be the first to write something!</p>
                    <a href="{{ route('articles.create') }}"
                        class="inline-block mt-4 px-6 py-2 bg-primary-container text-on-primary rounded-lg font-ui-button hover:bg-primary transition-all">Write
                        a Article</a>
                </div>
            @endforelse
            <!-- Pagination -->
            <div class="pt-8 flex justify-center">
                {{ $articles->links() }}
            </div>
        </section>
        <!-- Right Sidebar: Trending & Who to Follow -->
        <aside class="hidden lg:block lg:col-span-3 space-y-12">
            <!-- Trending Section -->
            <div class="bg-white border border-outline-variant rounded-xl p-6 space-y-6">
                <h3 class="font-headline-md text-[20px] text-on-surface">Trending on Ink</h3>
                <div class="space-y-6">
                    @forelse($popular_articles as $index => $article)
                        <div class="flex gap-4">
                            <span
                                class="font-display-lg text-secondary opacity-30 leading-none">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="space-y-1">
                                <h4
                                    class="font-ui-label text-ui-label font-bold text-on-surface leading-tight hover:text-primary cursor-pointer">
                                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                                </h4>
                                <p class="font-metadata text-metadata text-secondary">
                                    {{ $article->category ? $article->category->name : 'Uncategorized' }} •
                                    {{ \Illuminate\Support\Str::wordCount(strip_tags($article->content)) }} min read
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-secondary font-metadata text-metadata">No trending articles yet.</p>
                    @endforelse
                </div>
            </div>
            <!-- Who to Follow -->
            <div class="space-y-6">
                <h3 class="font-ui-label text-ui-label uppercase tracking-widest text-secondary font-bold">Recommended
                    Authors</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img alt="User" class="w-10 h-10 rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_bDNza0_XsizBBXy317LgL0ZlmEMBGHRNKyKJQEHUTZshyhzuRibQZzQeQZzBZYYQiReJ2d-IiJwtoIjp6M6rGrrwY37laL6K4BthiktNmgwhd0qebRtgpHmf8yFhbk-tHrPmUa7BNZsDbuhL6IgYwEAUf_kGkv_NiAdgkdMoXonaLJXpkAtuWiOU1uM4o9ZxZjLoB4P657GWFnuaJ4zwrnfXzPwxL1DmQ-hiP1T0i5Tr4yNY1JUGm0wgGbbwqoDe_zItDbBhPO9s" />
                            <div>
                                <p class="font-ui-label text-ui-label font-bold text-on-surface">Sarah Drasner</p>
                                <p class="font-metadata text-metadata text-secondary">Software Engineer</p>
                            </div>
                        </div>
                        <button
                            class="px-3 py-1 border border-on-surface text-on-surface rounded-full font-metadata text-metadata font-bold hover:bg-on-surface hover:text-white transition-all">Follow</button>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img alt="User" class="w-10 h-10 rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEbvciYQ2X_kcFKWWe0O2L03yycemd88WyF_ooBIPwvG-WUezMyveSVstWiBM3XBuBVeVDzlceL-_gL4AgUIr6BEBpg3Euz2S2UzZN3b7J0xsam1LeGO1NhpU_0esyYJLMpFBq04g-yrbxML5Mh9hqxz5h5TIJ9P7mJfg6g-cWjvM7qDXLTdmFZBp2k_85lHK2C98M3j3TVo-8bN-Fxw0iZjBGwnUEnXJTIzcuZiKkPQIYxNt5ft8vlUeIg_jxv3WpCbfdLVr_BibE" />
                            <div>
                                <p class="font-ui-label text-ui-label font-bold text-on-surface">David Perell</p>
                                <p class="font-metadata text-metadata text-secondary">Writer &amp; Educator</p>
                            </div>
                        </div>
                        <button
                            class="px-3 py-1 border border-on-surface text-on-surface rounded-full font-metadata text-metadata font-bold hover:bg-on-surface hover:text-white transition-all">Follow</button>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img alt="User" class="w-10 h-10 rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBn451ZfbDr0Yg1IXraoXumBVLm-GRjvj1ID8YSBo0NiOHTR4h-nTwkze6WtbjRnNOOMDcBV7PVYIEX2ErQLZ5CS0pjQHCWUfvRmnxBdvz8-Vx2EBwEKvXbfHCqrNa1VTMg8U0jzBuUI677uzcLVYBXfX-MGBuqjb8F88PuUlDth4sZu3gUuA2PIYmrVS-QFLFolBrLmvCbiZ1MixmBXlkAL8-XnIM-WJuv7SMkmfwFvY9i6LBBcJEWfjZDfTG8AOPKgzwjZMRCMCdJ" />
                            <div>
                                <p class="font-ui-label text-ui-label font-bold text-on-surface">Alice Wong</p>
                                <p class="font-metadata text-metadata text-secondary">Ethics in Tech</p>
                            </div>
                        </div>
                        <button
                            class="px-3 py-1 border border-on-surface text-on-surface rounded-full font-metadata text-metadata font-bold hover:bg-on-surface hover:text-white transition-all">Follow</button>
                    </div>
                </div>
                <a class="block font-ui-label text-ui-label text-primary font-bold hover:underline" href="#">View
                    all recommendations</a>
            </div>
            <!-- Newsletter Sign Up -->
            <div class="p-6 bg-primary-container rounded-xl text-on-primary space-y-4">
                <h3 class="font-headline-md text-[20px]">The Sunday Edition</h3>
                <p class="font-metadata text-metadata text-on-primary-container">Join 40,000+ creators receiving our weekly
                    digest on design, code, and intentional living.</p>
                <div class="space-y-2">
                    <input
                        class="w-full px-4 py-2 rounded bg-white/10 border border-white/20 text-white placeholder:text-white/60 focus:ring-1 focus:ring-white focus:outline-none"
                        placeholder="email@example.com" type="email" />
                    <button
                        class="w-full py-2 bg-white text-primary font-ui-button text-ui-button rounded hover:bg-opacity-90 transition-all">Subscribe</button>
                </div>
            </div>
        </aside>
    </div>
@endsection
