<div class="relative inline-block">
    <!-- Notification Bell Icon -->
    <button id="notificationBell" class="relative p-2 text-on-surface hover:text-primary transition-colors">
        <span class="material-symbols-outlined">notifications</span>
        <!-- Unread Badge -->
        <span id="unreadBadge"
            class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-on-primary bg-primary rounded-full hidden">
            <span id="unreadCount">0</span>
        </span>
    </button>

    <!-- Notification Dropdown Panel -->
    <div id="notificationPanel"
        class="hidden absolute right-0 top-full mt-2 w-96 bg-surface border border-outline-variant rounded-lg shadow-lg z-50">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b border-outline-variant">
            <h3 class="font-ui-label text-ui-label font-bold text-on-surface">Notifications</h3>
            <button id="markAllAsRead" class="text-xs text-primary hover:text-on-surface">Mark all as read</button>
        </div>

        <!-- Notifications List -->
        <div id="notificationsList" class="max-h-96 overflow-y-auto">
            <!-- Populated by JavaScript -->
            <div class="p-4 text-center text-secondary">Loading notifications...</div>
        </div>

        <!-- Footer with View All Link -->
        <div class="p-3 border-t border-outline-variant text-center">
            <a href="{{ route('notifications.view', [], false) }}"
                class="text-sm text-primary hover:underline">View all notifications</a>
        </div>
    </div>
</div>

<script>
    let trackedNotificationIds = new Set();

    document.addEventListener('DOMContentLoaded', function() {
        const bell = document.getElementById('notificationBell');
        const panel = document.getElementById('notificationPanel');
        const list = document.getElementById('notificationsList');
        const badge = document.getElementById('unreadBadge');
        const countEl = document.getElementById('unreadCount');
        const markAllBtn = document.getElementById('markAllAsRead');

        // Toggle panel
        bell.addEventListener('click', () => {
            panel.classList.toggle('hidden');
            if (!panel.classList.contains('hidden')) {
                loadNotifications();
            }
        });

        // Close panel when clicking outside
        document.addEventListener('click', (e) => {
            if (!bell.contains(e.target) && !panel.contains(e.target)) {
                panel.classList.add('hidden');
            }
        });

        // Load notifications
        async function loadNotifications() {
            try {
                const response = await ajax.get('/notifications/unread');
                const data = response.data;

                if (data.data.length === 0) {
                    list.innerHTML = '<div class="p-4 text-center text-secondary">No notifications</div>';
                    return;
                }

                // Check for new notifications and show toasts
                data.data.forEach(notif => {
                    if (!trackedNotificationIds.has(notif.id)) {
                        trackedNotificationIds.add(notif.id);
                        // Show toast for new notification (if window.showNotificationToast is available)
                        if (window.showNotificationToast) {
                            window.showNotificationToast(notif);
                        }
                    }
                });

                list.innerHTML = data.data.map(notif => `
                <div class="p-3 border-b border-outline-variant hover:bg-surface-container-low transition-colors cursor-pointer notification-item" data-id="${notif.id}">
                    <div class="flex justify-between items-start gap-2">
                        <div class="flex-1">
                            <p class="font-ui-label text-ui-label text-on-surface">${notif.type.replace(/_/g, ' ')}</p>
                            <p class="text-sm text-on-surface-variant mt-1">${notif.data.article_title || notif.data.follower_name || 'New notification'}</p>
                            <p class="text-xs text-secondary mt-1">${new Date(notif.created_at).toLocaleDateString()}</p>
                        </div>
                        <button class="text-secondary hover:text-primary delete-notif" data-id="${notif.id}">×</button>
                    </div>
                </div>
            `).join('');

                // Add event listeners
                document.querySelectorAll('.notification-item').forEach(item => {
                    item.addEventListener('click', () => markAsRead(item.dataset.id));
                });

                document.querySelectorAll('.delete-notif').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        deleteNotification(btn.dataset.id);
                    });
                });
            } catch (error) {
                console.error('Error loading notifications:', error);
                list.innerHTML =
                    '<div class="p-4 text-center text-red-500">Error loading notifications</div>';
            }
        }

        // Update unread count
        async function updateUnreadCount() {
            try {
                const response = await ajax.get('/notifications/unread-count');
                const data = response.data;
                const count = data.unread_count;

                countEl.textContent = count;
                if (count > 0) {
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            } catch (error) {
                console.error('Error updating unread count:', error);
            }
        }

        // Mark as read
        async function markAsRead(id) {
            try {
                await ajax.post(`/notifications/${id}/mark-as-read`);
                updateUnreadCount();
                loadNotifications();
            } catch (error) {
                console.error('Error marking as read:', error);
            }
        }

        // Mark all as read
        markAllBtn.addEventListener('click', async () => {
            try {
                await ajax.post('/notifications/mark-all-as-read');
                updateUnreadCount();
                loadNotifications();
            } catch (error) {
                console.error('Error marking all as read:', error);
            }
        });

        // Delete notification
        async function deleteNotification(id) {
            try {
                await ajax.delete(`/notifications/${id}`);
                updateUnreadCount();
                loadNotifications();
            } catch (error) {
                console.error('Error deleting notification:', error);
            }
        }

        // Initial load
        updateUnreadCount();

        // Refresh unread count every 30 seconds
        setInterval(updateUnreadCount, 30000);
    });
</script>
