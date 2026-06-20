/**
 * resources/js/articles/comments.js
 */

import { comments } from "../utils/ajax";

export function openCommentsDrawer(articleId) {
    const drawer = document.getElementById("commentsDrawer");
    const overlay = document.getElementById("drawerOverlay");
    const commentsList = document.getElementById("commentsList");
    const loader = document.getElementById("loadingSpinner");

    drawer.classList.toggle("hidden");
    overlay.classList.toggle("hidden");

    commentsList.innerHTML = "";
    loader.classList.remove("hidden");

    comments
        .index(articleId)
        .then((res) => {
            console.log(res);
            commentsList.innerHTML = res.data?.comments;
        })
        .catch((err) => {
            console.error("[Comments] ", err.message);
            commentsList.innerHTML =
                "Sorry, something wrong happend on loading comments!";
        })
        .finally(() => {
            loader.classList.add("hidden");
        });
}

export function closeCommentsDrawer() {
    const drawer = document.getElementById("commentsDrawer");
    const overlay = document.getElementById("drawerOverlay");
    drawer.classList.add("hidden");
    overlay.classList.add("hidden");
}

/**
 *
 * @param {SubmitEvent} event
 */
export function submitComment(event) {
    event.preventDefault();
    const submitBtn = document.getElementById("submitCommentBtn");
    const bodyInput = document.getElementById("commentBody");
    const commentsList = document.getElementById("commentsList");

    const data = new FormData(event.target);

    console.log({
        content: data.get("article_id"),
    });

    submitBtn.disabled = true;

    comments
        .store({ article_id: data.get("article_id"), body: data.get("body") })
        .then((res) => {
            bodyInput.value = "";
            const emptyMessage = commentsList.querySelector("#emptyMessage");
            emptyMessage?.remove();
            commentsList.insertAdjacentHTML("afterbegin", res.data?.comment);
        })
        .catch((err) => {
            console.error("[Store Comment] ", err.message);
        })
        .finally(() => {
            submitBtn.disabled = false;
        });
}
