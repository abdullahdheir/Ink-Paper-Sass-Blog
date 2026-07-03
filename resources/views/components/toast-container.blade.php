<div id="toastContainer" class="fixed top-4 right-4 z-[9999] space-y-3 pointer-events-none"></div>

<script>
    /**
     * Toast Notification System
     * Shows temporary notification messages to the user
     */
    window.showToast = function(message, type = 'success', duration = 4000) {
        const container = document.getElementById('toastContainer');
        const toastId = 'toast-' + Date.now();

        const typeConfig = {
            success: {
                bg: 'bg-green-500',
                icon: 'check_circle',
                textColor: 'text-white'
            },
            error: {
                bg: 'bg-red-500',
                icon: 'error',
                textColor: 'text-white'
            },
            info: {
                bg: 'bg-blue-500',
                icon: 'info',
                textColor: 'text-white'
            },
            warning: {
                bg: 'bg-yellow-500',
                icon: 'warning',
                textColor: 'text-white'
            }
        };

        const config = typeConfig[type] || typeConfig.success;

        const toast = document.createElement('div');
        toast.id = toastId;
        toast.className =
            `${config.bg} ${config.textColor} px-4 py-3 rounded-lg shadow-lg flex items-center gap-3 pointer-events-auto animate-fadeInSlide`;
        toast.innerHTML = `
            <span class="material-symbols-outlined text-5">${config.icon}</span>
            <span class="font-ui-label text-ui-label">${message}</span>
            <button onclick="document.getElementById('${toastId}').remove()" class="ml-auto hover:opacity-75 transition-opacity">
                <span class="material-symbols-outlined text-4">close</span>
            </button>
        `;

        container.appendChild(toast);

        // Auto remove after duration
        setTimeout(() => {
            toast.classList.add('animate-fadeOutSlide');
            setTimeout(() => toast.remove(), 300);
        }, duration);
    };

    /**
     * Show notification toast - triggered by API responses
     */
    window.showNotificationToast = function(notification) {
        const data = JSON.parse(notification.data);
        let message = '';

        switch (notification.type) {
            case 'article_published':
                message = `📰 ${data.author_name} published "${data.article_title}"`;
                break;
            case 'comment_posted':
                message = `💬 ${data.commenter_name} commented on your article`;
                break;
            case 'comment_replied':
                message = `↩️ ${data.replier_name} replied to your comment`;
                break;
            case 'article_liked':
                message = `❤️ ${data.liker_name} liked your article`;
                break;
            case 'user_followed':
                message = `👥 ${data.follower_name} started following you`;
                break;
            default:
                message = 'New notification';
        }

        window.showToast(message, 'info', 5000);
    };

    /**
     * Poll for new notifications every 30 seconds and show toast for new ones
     */
    let lastNotificationIds = new Set();

    async function pollNotifications() {
        try {
            const response = await fetch('/notifications/unread?per_page=100');
            const data = await response.json();

            if (data.data && data.data.data) {
                data.data.data.forEach(notification => {
                    if (!lastNotificationIds.has(notification.id)) {
                        lastNotificationIds.add(notification.id);
                        // Show toast only for new notifications
                        window.showNotificationToast(notification);
                    }
                });
            }
        } catch (error) {
            console.error('Error polling notifications:', error);
        }
    }

    // Start polling when user is authenticated
    document.addEventListener('DOMContentLoaded', function() {
        // Check if user is authenticated by looking for auth marker
        if (document.querySelector('[data-auth-user]')) {
            // Initial poll
            pollNotifications();

            // Poll every 30 seconds
            setInterval(pollNotifications, 30000);
        }
    });

    // Keyboard shortcut: Ctrl+Shift+N to test toast
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.shiftKey && e.key === 'N') {
            window.showToast('This is a test notification', 'success');
        }
    });
</script>

<style>
    @keyframes fadeInSlide {
        from {
            opacity: 0;
            transform: translateX(100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeOutSlide {
        from {
            opacity: 1;
            transform: translateX(0);
        }

        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }

    .animate-fadeInSlide {
        animation: fadeInSlide 0.3s ease-out;
    }

    .animate-fadeOutSlide {
        animation: fadeOutSlide 0.3s ease-out;
    }

    #toastContainer {
        @apply will-change-transform;
    }
</style>
