/**
 * resources/js/utils/follow.js
 */

import { authors } from './ajax.js';

/**
 * Called by onclick="toggleFollow(this)" on the follow button.
 * @param {HTMLButtonElement} btn
 */
export async function toggleFollow(btn) {
    const username   = btn.dataset.username;
    const isFollowing = btn.dataset.following === 'true';

    _setLoading(btn, true);

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
        if (err.status === 401) {
            window.location.href = '/login';
            return;
        }
        console.error('[follow]', err.message);
    } finally {
        _setLoading(btn, false);
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// Helpers
// ─────────────────────────────────────────────────────────────────────────────

function _setLoading(btn, loading) {
    const spinner = btn.querySelector('.follow-spinner');
    const label   = btn.querySelector('.follow-label');

    btn.disabled          = loading;
    spinner.classList.toggle('hidden', !loading);
    label.style.opacity   = loading ? '0' : '1';
}

function _setState(btn, isFollowing) {
    const label = btn.querySelector('.follow-label');

    btn.dataset.following = isFollowing ? 'true' : 'false';
    label.textContent     = isFollowing ? 'Following' : 'Follow Author';

    // Swap styles
    btn.classList.toggle('bg-primary-container', !isFollowing);
    btn.classList.toggle('bg-surface-container', isFollowing);
    btn.classList.toggle('text-on-primary',       !isFollowing);
    btn.classList.toggle('text-on-surface',        isFollowing);
}
