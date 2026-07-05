<div id="drawerOverlay" class="fixed inset-0 bg-black hidden opacity-50 z-50 transition-opacity"
    onclick="closeCommentsDrawer()"></div>
<div id="commentsDrawer"
    class="fixed hidden top-0 right-0 z-60 w-80 h-full bg-white shadow-2x1 transform transition-transform duration-300 ease-in-out">
    <div class="p-4 flex justify-between items-center border-b border-gray-200 bg-gray-50">
        <h2 class="text-lg font-bold text-gray-800">Comments</h2>
        <button onclick="closeCommentsDrawer()"
            class="text-gray-500 hover:text-red-600 text-2x1 leading-none">&times;</button>
    </div>

    <div class="p-5 border-b border-gray-200 bg-white shrink-0">
        <form onsubmit="submitComment(event)" id="addCommentForm">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}" />
            <textarea id="commentBody" rows="3" name="body" required placeholder="Write your comment..."
                class="w-full border border-gray-300 rounded p-2 text-sm focus:outline-noe focus:ring-2 focus:ring-blue-500"></textarea>
            <button id="submitCommentBtn" type="submit"
                class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors disabled:opacity-50">
                <span class="material-symbols-outlined group-hover:text-primary transition-colors">send</span>
            </button>
        </form>
    </div>

    <div id="commentsContent" class="p-4 overflow-y-auto h-[calc(100vh-70px)]">
        <div id="loadingSpinner" class="hidden text-center text-gray-500 mt-10">
            Loading Comments...
        </div>
        <div id="commentsList"></div>
    </div>
</div>
