/**
 * resources/js/articles/follow.js
 */

import { authors } from "../utils/ajax";


/**
 * Called by onclick="toggleFollow(this)" on the follow button.
 * @param {HTMLButtonElement} btn
 * @param {boolean} loading
 */
export async function toggleFollow(btn, loading = true) {
    const username = btn.dataset.username;
    const isFollowing = btn.dataset.following === "true";

    if (loading) _setLoading(btn, true);

    try {
        if (isFollowing) {
            await authors.unfollow(username);
            _setState(btn, false);
        } else {
            await authors.follow(username);
            _setState(btn, true);
        }
    } catch (err) {
        // Not logged in → redirect to login
        console.error("[follow]", err.message);
    } finally {
        if (loading) _setLoading(btn, false);
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// Helpers
// ─────────────────────────────────────────────────────────────────────────────

/**
 *
 * @param {HTMLButtonElement} btn
 * @param {boolean} loading
 */
function _setLoading(btn, loading) {
    const spinner = btn.querySelector(".follow-spinner");
    const label = btn.querySelector(".follow-label");

    btn.disabled = loading;
    spinner.classList.toggle("hidden", !loading);
    label.style.opacity = loading ? "0" : "1";
}

/**
 *
 * @param {HTMLButtonElement} btn
 * @param {boolean} isFollowing
 */
function _setState(btn, isFollowing) {
    const label = btn.querySelector(".follow-label");

    btn.dataset.following = isFollowing ? "true" : "false";
    label.textContent = isFollowing ? "Following" : "Follow";

    // Swap styles
    if (btn.hasAttribute("data-button")) {
        btn.classList.toggle("bg-primary-container", !isFollowing);
        btn.classList.toggle("bg-surface-container", isFollowing);
        btn.classList.toggle("text-on-primary", !isFollowing);
        btn.classList.toggle("text-on-surface", isFollowing);
    }
}
