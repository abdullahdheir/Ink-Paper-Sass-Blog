import { toggleBookmark } from "./bookmark.js";
import { closeCommentsDrawer, openCommentsDrawer, submitComment } from "./comments.js";
import { toggleFollow } from "./follow.js";
import { toggleArticleLike } from "./like.js";

window.toggleArticleLike = toggleArticleLike;
window.toggleBookmark = toggleBookmark;
window.toggleFollow = toggleFollow;
window.openCommentsDrawer = openCommentsDrawer;
window.closeCommentsDrawer = closeCommentsDrawer;
window.submitComment = submitComment;
