/**
 * resources/js/articles/bookmark.js
 */

import { articles } from "../utils/ajax.js";

/**
 * Called by onclick="toggleBookmark(this)" on the bookmark button.
 * @param {HTMLButtonElement} btn
 * @param {*} id
 */
export async function toggleBookmark(btn, id) {
    const isBookmarked = btn.dataset.bookmarked === "true";
    try {
        if (!isBookmarked) {
            const res = await articles.bookmark(id);
            _setState(btn, true, res.data?.count);
        } else {
            const res = await articles.unbookmark(id);
            _setState(btn, false, res.data?.count);
        }
    } catch (err) {
        console.error("[Bookmark]", err.message);
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// Helpers
// ─────────────────────────────────────────────────────────────────────────────

/**
 *
 * @param {HTMLButtonElement} btn
 * @param {boolean} isBookmarked
 * @param {?string} count
 */
function _setState(btn, isBookmarked, count) {
    const icon = btn.querySelector(".material-symbols-outlined");
    icon.classList.toggle("text-yellow-500", isBookmarked);
    btn.dataset.bookmarked = isBookmarked ? "true" : "false";

    if (count) {
        const bookmarkCount = btn.querySelector(".count");
        bookmarkCount.textContent = count;
    }
}
