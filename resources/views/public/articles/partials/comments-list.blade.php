@forelse ($comments as $comment)
    @include('public.articles.partials.single-comment')
@empty
    <p id="emptyMessage" class="text-gray-500 text-center mt-4">No comments yet.</p>
@endforelse
