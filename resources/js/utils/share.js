/**
 * resources/js/utils/share.js
 *
 * Safe wrapper around navigator.share() with clipboard fallback.
 */

/**
 * @param {Object} data
 * @param {string} [data.title]
 * @param {string} [data.text]
 * @param {string} [data.url]
 */
export async function share({ title, text, url } = {}) {
    // Build only the fields that are non-empty strings
    const shareData = {};
    if (title?.trim()) shareData.title = title.trim();
    if (text?.trim()) shareData.text = text.trim();
    if (url?.trim()) shareData.url = url.trim();

    // At least one known field must exist
    const hasValidData = shareData.title || shareData.text || shareData.url;

    if (!hasValidData) {
        console.warn("[share] No valid share data supplied.");
        return;
    }

    // Use Web Share API if available and the data passes canShare()
    if (navigator.share && navigator.canShare?.(shareData)) {
        try {
            await navigator.share(shareData);
            return;
        } catch (err) {
            // User cancelled — not an error
            if (err.name === "AbortError") return;
            console.warn("[share] navigator.share failed, falling back.", err);
        }
    }

    // Fallback: copy URL to clipboard
    const textToCopy = shareData.url ?? shareData.text ?? shareData.title ?? "";
    try {
        await navigator.clipboard.writeText(textToCopy);
        showCopyToast("Link copied to clipboard!");
    } catch {
        // Last resort: prompt
        window.prompt("Copy this link:", textToCopy);
    }
}

function showCopyToast(message) {
    const existing = document.getElementById("share-toast");
    if (existing) existing.remove();

    const toast = document.createElement("div");
    toast.id = "share-toast";
    toast.textContent = message;
    toast.style.cssText = `
        position: fixed; bottom: 1.5rem; left: 50%; transform: translateX(-50%);
        background: #1a1c1c; color: #fff; padding: .5rem 1.25rem;
        border-radius: 999px; font-size: .875rem; z-index: 9999;
        animation: fadeInUp .2s ease;
    `;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 2500);
}
