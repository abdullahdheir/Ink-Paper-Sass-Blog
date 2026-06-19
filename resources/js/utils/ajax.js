/**
 * resources/js/utils/ajax.js
 *
 * Central HTTP client for Ink & Paper — Blade/Session based.
 * Auth is handled by Laravel session cookie (no Bearer token needed).
 * - CSRF token from meta tag
 * - credentials: 'same-origin' to send session cookie automatically
 * - Automatic retry on 5xx / network errors
 * - Global loading state with callbacks
 * - Typed error handling
 */

// ─────────────────────────────────────────────────────────────────────────────
// Config
// ─────────────────────────────────────────────────────────────────────────────

const MAX_RETRY = 2;
const RETRY_DELAY_MS = 500; // doubles each attempt: 500ms → 1000ms

// ─────────────────────────────────────────────────────────────────────────────
// Loading State
// ─────────────────────────────────────────────────────────────────────────────

let _pendingRequests = 0;
const _loadingCallbacks = { start: [], end: [] };

function onLoadingStart(fn) {
    _loadingCallbacks.start.push(fn);
}
function onLoadingEnd(fn) {
    _loadingCallbacks.end.push(fn);
}

function _incrementLoading() {
    _pendingRequests++;
    if (_pendingRequests === 1) _loadingCallbacks.start.forEach((fn) => fn());
}

function _decrementLoading() {
    _pendingRequests = Math.max(0, _pendingRequests - 1);
    if (_pendingRequests === 0) _loadingCallbacks.end.forEach((fn) => fn());
}

// ─────────────────────────────────────────────────────────────────────────────
// CSRF
// ─────────────────────────────────────────────────────────────────────────────

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]')?.content ?? "";
}

// ─────────────────────────────────────────────────────────────────────────────
// ajax Error Class
// ─────────────────────────────────────────────────────────────────────────────

class ajaxError extends Error {
    constructor(status, message, errors = {}, raw = {}) {
        super(message);
        this.name = "ajaxError";
        this.status = status;
        this.errors = errors;
        this.raw = raw;
    }

    get isUnauthenticated() {
        return this.status === 401;
    } // not logged in
    get isForbidden() {
        return this.status === 403;
    } // logged in but no permission
    get isNotFound() {
        return this.status === 404;
    }
    get isValidation() {
        return this.status === 422;
    }
    get isServerError() {
        return this.status >= 500;
    }

    /** First validation message for a field, e.g. err.fieldError('email') */
    fieldError(field) {
        return this.errors?.[field]?.[0] ?? null;
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// Core Request
// ─────────────────────────────────────────────────────────────────────────────

function _sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}

/**
 * @param {string} method
 * @param {string} endpoint        e.g. '/articles'
 * @param {Object|null} body
 * @param {Object} options
 * @param {Object} [options.headers]
 * @param {number} [options.retry]
 * @param {AbortSignal} [options.signal]
 */
async function _request(method, endpoint, body = null, options = {}) {
    const {
        headers: extraHeaders = {},
        retry = MAX_RETRY,
        signal = null,
    } = options;

    const url = endpoint.startsWith("http") ? endpoint : endpoint;

    const headers = {
        "Content-Type": "application/json",
        Accept: "application/json",
        "X-CSRF-TOKEN": getCsrfToken(),
        "X-Requested-With": "XMLHttpRequest", // tells Laravel it's an AJAX request
        ...extraHeaders,
    };

    const init = {
        method,
        headers,
        signal,
        credentials: "same-origin", // ← sends Laravel session cookie automatically
        ...(body !== null ? { body: JSON.stringify(body) } : {}),
    };

    _incrementLoading();

    let attempt = 0;

    while (true) {
        try {
            const response = await fetch(url, init);

            // 204 No Content — nothing to parse
            if (response.status === 204) {
                _decrementLoading();
                return null;
            }

            const data = await response.json().catch(() => ({}));

            if (!response.ok) {
                // 401 → session expired or not logged in → redirect to login
                if (response.status === 401) {
                    window.location.href = "/login";
                    return;
                }

                throw new ajaxError(
                    response.status,
                    data?.message ?? `HTTP ${response.status}`,
                    data?.errors ?? {},
                    data,
                );
            }

            _decrementLoading();
            return data;
        } catch (err) {
            const shouldRetry =
                attempt < retry &&
                !(err instanceof ajaxError) &&
                err.name !== "AbortError";

            if (shouldRetry) {
                attempt++;
                await _sleep(RETRY_DELAY_MS * attempt);
                continue;
            }

            _decrementLoading();

            if (!(err instanceof ajaxError)) {
                throw new ajaxError(0, err.message ?? "Network error", {}, {});
            }

            throw err;
        }
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// HTTP Methods
// ─────────────────────────────────────────────────────────────────────────────

const ajax = {
    get: (endpoint, options = {}) => _request("GET", endpoint, null, options),
    post: (endpoint, body, options = {}) =>
        _request("POST", endpoint, body, options),
    put: (endpoint, body, options = {}) =>
        _request("PUT", endpoint, body, options),
    patch: (endpoint, body, options = {}) =>
        _request("PATCH", endpoint, body, options),
    delete: (endpoint, options = {}) =>
        _request("DELETE", endpoint, null, options),

    // ── Multipart upload (avatar, cover image) ───────────────────────────────
    async upload(endpoint, formData, options = {}) {
        // Don't set Content-Type — browser sets it with boundary automatically
        const headers = {
            Accept: "application/json",
            "X-CSRF-TOKEN": getCsrfToken(),
            "X-Requested-With": "XMLHttpRequest",
            ...(options.headers ?? {}),
        };

        _incrementLoading();

        try {
            const res = await fetch(endpoint, {
                method: "POST",
                headers,
                body: formData,
                credentials: "same-origin",
                signal: options.signal ?? null,
            });
            _decrementLoading();
            const data = await res.json().catch(() => ({}));
            if (!res.ok)
                throw new ajaxError(
                    res.status,
                    data?.message ?? `HTTP ${res.status}`,
                    data?.errors ?? {},
                    data,
                );
            return await data;
        } catch (err) {
            _decrementLoading();
            throw err;
        }
    },

    onLoadingStart,
    onLoadingEnd,
    ajaxError,
};

export default ajax;

// ─────────────────────────────────────────────────────────────────────────────
// Domain Endpoints
// ─────────────────────────────────────────────────────────────────────────────

export const articles = {
    feed: (page = 1) => ajax.get(`/articles?page=${page}`),
    show: (slug) => ajax.get(`/articles/${slug}`),
    store: (data) => ajax.post("/articles", data),
    update: (id, data) => ajax.put(`/articles/${id}`, data),
    destroy: (id) => ajax.delete(`/articles/${id}`),
    publish: (id) => ajax.patch(`/articles/${id}/publish`),
    like: (id) => ajax.post(`/articles/${id}/like`),
    unlike: (id) => ajax.delete(`/articles/${id}/like`),
    bookmark: (id) => ajax.post(`/articles/${id}/bookmark`),
    unbookmark: (id) => ajax.delete(`/articles/${id}/bookmark`),
    search: (q, page = 1) =>
        ajax.get(`/search?q=${encodeURIComponent(q)}&page=${page}`),
};

export const authors = {
    profile: (username) => ajax.get(`/authors/${username}`),
    follow: (username) => ajax.post(`/authors/${username}/follow`),
    unfollow: (username) => ajax.delete(`/authors/${username}/follow`),
    followers: (username, page = 1) =>
        ajax.get(`/authors/${username}/followers?page=${page}`),
    following: (username, page = 1) =>
        ajax.get(`/authors/${username}/following?page=${page}`),
};

export const notifications = {
    index: () => ajax.get("/notifications"),
    markRead: (id) => ajax.patch(`/notifications/${id}/read`),
    markAll: () => ajax.patch("/notifications/read-all"),
};

export const comments = {
    index: (articleId) => ajax.get(`/articles/${articleId}/comments`),
    store: (articleId, data) =>
        ajax.post(`/articles/${articleId}/comments`, data),
    destroy: (id) => ajax.delete(`/comments/${id}`),
    like: (id) => ajax.post(`/comments/${id}/like`),
};

export const settings = {
    updateProfile: (data) => ajax.put("/settings/profile", data),
    updateAvatar: (formData) => ajax.upload("/settings/avatar", formData),
    updatePassword: (data) => ajax.put("/settings/password", data),
    updateNotifications: (data) => ajax.put("/settings/notifications", data),
};
