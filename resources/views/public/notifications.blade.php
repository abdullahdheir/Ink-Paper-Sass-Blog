@extends('layouts.public')

@section('title', 'Notifications - Ink & Paper')

@section('page-content')
    <div class="max-w-container-max mx-auto px-gutter">
        <!-- Header -->
        <div class="mb-2">
            <h1 class="font-display-lg text-display-lg text-on-surface mb-2">Notifications</h1>
            <p class="text-on-surface-variant">Stay updated with all your activity</p>
        </div>

        <!-- Toolbar -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex gap-4">
                <button id="filterAll"
                    class="px-4 py-2 bg-primary text-on-primary rounded-lg font-ui-label text-ui-label filter-btn"
                    data-filter="all">All</button>
                <button id="filterUnread"
                    class="px-4 py-2 bg-surface-container text-on-surface rounded-lg font-ui-label text-ui-label hover:bg-primary hover:text-on-primary transition-all filter-btn"
                    data-filter="unread">Unread</button>
            </div>
            <button id="clearAll"
                class="px-4 py-2 border border-outline-variant text-on-surface hover:bg-surface-container rounded-lg font-ui-label text-ui-label transition-all">Clear
                All</button>
        </div>

        <!-- Notifications Grid -->
        <div class="grid grid-cols-1 gap-4" id="notificationsGrid">
            <div class="text-center py-12">
                <p class="text-on-surface-variant font-ui-label text-ui-label">Loading notifications...</p>
            </div>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="flex items-center justify-center gap-4 mt-12"></div>
    </div>

    <style>
        .notification-card {
            @apply bg-surface-container-low border border-outline-variant rounded-lg p-6 hover:border-primary transition-colors;
        }

        .notification-card.unread {
            @apply bg-primary-container border-primary;
        }

        .notification-card.read {
            @apply opacity-75;
        }
    </style>

    <script>
        let currentFilter = 'all';
        let currentPage = 1;

        document.addEventListener('DOMContentLoaded', function() {
            // Filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.filter-btn').forEach(b => {
                        b.classList.remove('bg-primary', 'text-on-primary');
                        b.classList.add('bg-surface-container', 'text-on-surface');
                    });
                    btn.classList.add('bg-primary', 'text-on-primary');
                    btn.classList.remove('bg-surface-container', 'text-on-surface');

                    currentFilter = btn.dataset.filter;
                    currentPage = 1;
                    loadNotifications();
                });
            });

            // Clear all button
            document.getElementById('clearAll').addEventListener('click', async () => {
                if (confirm('Are you sure you want to delete all notifications?')) {
                    try {
                        await fetch('/notifications', {
                            method: 'DELETE'
                        });
                        loadNotifications();
                    } catch (error) {
                        console.error('Error clearing notifications:', error);
                    }
                }
            });

            loadNotifications();
        });

        async function loadNotifications() {
            const grid = document.getElementById('notificationsGrid');
            const endpoint = currentFilter === 'unread' ? '/notifications/unread' : '/notifications';

            try {
                const response = await ajax.get(`${endpoint}?page=${currentPage}&per_page=10`);
                const data =response.data;

                if (data.data.length === 0) {
                    grid.innerHTML =
                        '<div class="text-center py-12 col-span-full"><p class="text-on-surface-variant">No notifications found</p></div>';
                    document.getElementById('pagination').innerHTML = '';
                    return;
                }

                grid.innerHTML = data.data.map(notif => {
                    const notifData = notif.data;
                    const getTypeColor = (type) => {
                        switch (type) {
                            case 'article_published':
                                return 'bg-blue-100 text-blue-800';
                            case 'comment_posted':
                                return 'bg-green-100 text-green-800';
                            case 'article_liked':
                                return 'bg-red-100 text-red-800';
                            case 'user_followed':
                                return 'bg-purple-100 text-purple-800';
                            default:
                                return 'bg-gray-100 text-gray-800';
                        }
                    };

                    return `
                <div class="notification-card ${notif.read_at ? 'read' : 'unread'}">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex-1">
                            <span class="inline-block px-2 py-1 rounded text-xs font-bold ${getTypeColor(notif.data.type)} mb-2">
                                ${notif.data.type.replace(/_/g, ' ').toUpperCase()}
                            </span>
                            <p class="font-headline-sm text-headline-sm text-on-surface mt-2">
                                ${getNotificationMessage(notif.data, notifData)}
                            </p>
                            <p class="text-metadata font-metadata text-secondary mt-2">
                                ${formatDate(notif.created_at)}
                            </p>
                        </div>
                        <div class="flex gap-2">
                            ${!notif.read_at ? `<button class="px-3 py-1 text-xs bg-primary text-on-primary rounded mark-read-btn" data-id="${notif.id}">Mark as read</button>` : ''}
                            <button class="px-3 py-1 text-xs border border-outline-variant rounded delete-btn hover:bg-red-100" data-id="${notif.id}">Delete</button>
                        </div>
                    </div>
                </div>
            `;
                }).join('');

                // Add event listeners
                document.querySelectorAll('.mark-read-btn').forEach(btn => {
                    btn.addEventListener('click', async () => {
                        const id = btn.dataset.id;
                        await fetch(`/notifications/${id}/mark-as-read`, {
                            method: 'POST'
                        });
                        loadNotifications();
                    });
                });

                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', async () => {
                        const id = btn.dataset.id;
                        await fetch(`/notifications/${id}`, {
                            method: 'DELETE'
                        });
                        loadNotifications();
                    });
                });

                // Render pagination
                renderPagination(data.data);
            } catch (error) {
                console.error('Error loading notifications:', error);
                grid.innerHTML =
                    '<div class="text-center py-12 col-span-full text-red-500">Error loading notifications</div>';
            }
        }

        function getNotificationMessage(data) {
            switch (data.type) {
                case 'article_published':
                    return `${data.author_name} published "${data.article_title}"`;
                case 'comment_posted':
                    return `${data.commenter_name} commented on "${data.article_title}"`;
                case 'comment_replied':
                    return `${data.replier_name} replied to your comment`;
                case 'article_liked':
                    return `${data.liker_name} liked "${data.article_title}"`;
                case 'user_followed':
                    return `${data.follower_name} followed you`;
                default:
                    return 'New notification';
            }
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffMs = now - date;
            const diffMins = Math.floor(diffMs / 60000);
            const diffHours = Math.floor(diffMs / 3600000);
            const diffDays = Math.floor(diffMs / 86400000);

            if (diffMins < 1) return 'just now';
            if (diffMins < 60) return `${diffMins} minute${diffMins > 1 ? 's' : ''} ago`;
            if (diffHours < 24) return `${diffHours} hour${diffHours > 1 ? 's' : ''} ago`;
            if (diffDays < 30) return `${diffDays} day${diffDays > 1 ? 's' : ''} ago`;

            return date.toLocaleDateString();
        }

        function renderPagination(paginated) {
            const container = document.getElementById('pagination');

            if (!paginated.links || paginated.links.length === 0) {
                container.innerHTML = '';
                return;
            }

            container.innerHTML = paginated.links.map(link => {
                if (link.url === null) {
                    return `<span class="px-3 py-1 text-gray-400 cursor-not-allowed">${link.label}</span>`;
                }

                const isActive = link.active;
                return `
            <button
                class="px-3 py-1 rounded border transition-all ${isActive ? 'bg-primary text-on-primary' : 'border-outline-variant hover:bg-surface-container'}"
                onclick="currentPage = ${link.label}; loadNotifications()">
                ${link.label}
            </button>
        `;
            }).join('');
        }
    </script>
@endsection
