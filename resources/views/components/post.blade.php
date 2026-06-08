<article class="flex flex-col md:flex-row gap-8 group">
    <div
        class="w-full md:w-1/3 aspect-video md:aspect-square overflow-hidden rounded-lg border border-outline-variant bg-surface-container flex items-center justify-center">
        <img src="{{ $post->cover_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover" />
    </div>
    <div class="w-full md:w-2/3 space-y-3">
        <div class="flex items-center gap-2 font-metadata text-metadata text-secondary">
            @if ($post->category)
                <span class="text-primary font-bold">{{ $post->category->name }}</span>
                <span>•</span>
            @endif
            <span>{{ $post->created_at->format('M d, Y') }}</span>
        </div>
        <h3 class="font-headline-md text-[24px] leading-snug text-on-surface group-hover:text-primary transition-colors">
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        </h3>
        <p class="text-on-surface-variant font-body-md text-body-md line-clamp-2">
            {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}
        </p>
        <div class="flex items-center justify-between pt-4 border-t border-outline-variant">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-full bg-surface-container border border-outline-variant overflow-hidden flex items-center justify-center">
                    <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name ?? 'Author' }}"
                        class="w-full h-full object-cover" />
                </div>
                <div>
                    <p class="font-ui-label text-ui-label font-bold text-on-surface">
                        {{ $post->user->name ?? 'Author' }}</p>
                    <p class="font-metadata text-metadata text-secondary">
                        {{ $post->category ? $post->category->name : 'Uncategorized' }}</p>
                </div>
            </div>
            <a href="{{ route('posts.show', $post->id) }}"
                class="text-primary p-2 rounded-full hover:bg-primary-container/10 transition-colors">
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </div>
</article>
