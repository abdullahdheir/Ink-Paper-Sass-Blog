@props(['article'])

<article class="flex flex-col md:flex-row gap-8 items-start group">
    <div
        class="w-full md:w-80 h-52 shrink-0 overflow-hidden rounded-lg border border-outline-variant bg-surface-container-low">
        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
            data-alt="{{ $article->excerpt }}" src="{{ $article->cover_url }}" />
    </div>
    <div class="flex-1 space-y-4">
        <div class="flex items-center gap-3">
            @if ($article->category_id)
                <span
                    class="bg-primary-fixed text-on-primary-fixed px-3 py-1 rounded-full font-metadata text-metadata uppercase tracking-widest">{{ $aritcle->category->name }}</span>
            @endif
            <span
                class="font-metadata text-metadata text-secondary">{{ $article->published_at?->format('M d YYYY') . ' . ' . $article->reading_time }}
                min
                read</span>
        </div>
        <h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">
            {{ $article->title }}</h3>
        <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">{!! $article->content !!}</p>
        <div class="flex items-center gap-6 pt-2">
            <button class="flex items-center gap-2 font-ui-label text-ui-label text-secondary hover:text-on-surface">
                <span class="material-symbols-outlined text-[18px]" data-icon="thumb_up">thumb_up</span>
                {{ $article->likes_count }}
            </button>
            <button class="flex items-center gap-2 font-ui-label text-ui-label text-secondary hover:text-on-surface">
                <span class="material-symbols-outlined text-[18px]" data-icon="chat_bubble">chat_bubble</span>
                {{ $article->comments_count }}
            </button>
            <button class="ml-auto p-2 text-secondary hover:text-primary transition-colors">
                <span class="material-symbols-outlined" data-icon="bookmark_add">bookmark_add</span>
            </button>
        </div>
    </div>
</article>
