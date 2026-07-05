@props(['author'])
@auth
    @php
        $isFollowing = auth()->user()->isFollowing($author);
    @endphp

    @if (auth()->user()->id !== $author->id)
        <button id="follow-btn-{{ $author->id }}" data-button="true" data-username="{{ $author->username }}"
            data-following="{{ $isFollowing ? 'true' : 'false' }}" onclick="toggleFollow(this)"
            class="follow-btn relative flex items-center gap-2 cursor-pointer @if ($isFollowing) bg-surface-container text-on-surface @else  bg-primary-container text-on-primary @endif px-8 py-3 rounded-lg font-ui-button text-ui-button hover:opacity-90 transition-all disabled:opacity-60 disabled:cursor-not-allowed">

            {{-- Spinner (hidden by default) --}}
            <svg class="follow-spinner hidden animate-spin h-4 w-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>

            {{-- Label --}}
            <span class="follow-label">
                {{ $isFollowing ? 'Following' : 'Follow' }}
            </span>
        </button>
    @endif
@endauth
