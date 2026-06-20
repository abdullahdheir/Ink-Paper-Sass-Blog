<div class="mb-4 pb-4 border-b border-gray-200">
    <h5 class="font-bold text-sm text-gray-800">
        <a class="flex items-center" href="{{ route('authors.profile', $comment->author->username ?? 1) }}"
            target="_blank">
            <img class="w-5 h-5 me-1 rounded-full grayscale" src="{{ $comment->author->avatar }}" />
            {{ $comment->author->name }}</a>
    </h5>
    <p class="text-gray-600 text-sm mt-1">{{ $comment->body }}</p>
    <span class="text-xs text-gray-400">{{ $comment->created_at?->diffForHumans() }}</span>
</div>
