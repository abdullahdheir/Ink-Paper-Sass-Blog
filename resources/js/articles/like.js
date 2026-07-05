/**
 * resources/js/articles/like.js
 */

import { articles } from "../utils/ajax.js";

/**
 * Called by onclick="toggleLike(this)" on the like button.
 * @param {HTMLButtonElement} btn
 * @param {*} id
 */
export async function toggleArticleLike(btn, id) {
    const isLiked = btn.dataset.liked === "true";
    try {
        if (!isLiked) {
            const res = await articles.like(id);
            _setState(btn, true, res.data?.count);
        } else {
            const res = await articles.unlike(id);
            _setState(btn, false, res.data?.count);
        }
    } catch (err) {
        console.error("[Like]", err.message);
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// Helpers
// ─────────────────────────────────────────────────────────────────────────────

/**
 *
 * @param {HTMLButtonElement} btn
 * @param {boolean} isLiked
 * @param {?string} count
 */
function _setState(btn, isLiked, count) {
    const icon = btn.querySelector(".material-symbols-outlined");
    icon.classList.toggle("text-red-500", isLiked);
    btn.dataset.liked = isLiked ? "true" : "false";

    if (count) {
        const likeCount = btn.querySelector(".count");
        likeCount.textContent = count;
    }
}
