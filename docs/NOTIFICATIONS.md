# Notifications System - Ink & Paper

## Overview

A complete notification system that sends real-time alerts to users for various activities including article publications, comments, likes, and follows.

## Architecture

### Components

1. **Events** (`app/Events/`)
    - `ArticlePublished` - Triggered when an article is published
    - `CommentPosted` - Triggered when a comment is created
    - `ArticleLiked` - Triggered when an article is liked
    - `UserFollowed` - Triggered when a user is followed

2. **Listeners** (`app/Listeners/`)
    - `SendArticlePublishedNotification` - Notifies followers
    - `SendCommentNotification` - Notifies article author and parent comment author
    - `SendArticleLikedNotification` - Notifies article author
    - `SendUserFollowedNotification` - Notifies the followed user

3. **Controller** (`app/Http/Controllers/NotificationController.php`)
    - RESTful API endpoints for notification management
    - Handles fetch, mark read/unread, and delete operations

4. **Database**
    - `notifications` table stores all notification records
    - Fields: `id`, `user_id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`

### Database Schema

```sql
CREATE TABLE notifications (
    id UUID PRIMARY KEY,
    user_id UNSIGNED BIGINT FOREIGN KEY,
    type VARCHAR(50),
    notifiable_type VARCHAR(255),
    notifiable_id BIGINT,
    data LONGTEXT (JSON),
    read_at TIMESTAMP NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    KEY(user_id, read_at)
);
```

## API Endpoints

All endpoints require authentication and are prefixed with `/notifications`:

| Method | Endpoint                         | Description                    |
| ------ | -------------------------------- | ------------------------------ |
| GET    | `/`                              | List all notifications         |
| GET    | `/unread-count`                  | Get unread notification count  |
| GET    | `/unread`                        | List unread notifications      |
| POST   | `/{notification}/mark-as-read`   | Mark notification as read      |
| POST   | `/{notification}/mark-as-unread` | Mark notification as unread    |
| POST   | `/mark-all-as-read`              | Mark all notifications as read |
| DELETE | `/{notification}`                | Delete a notification          |
| DELETE | `/`                              | Delete all notifications       |

### Example Requests

```bash
# Get unread notifications
curl -H "Authorization: Bearer TOKEN" \
  https://inkpaper.com/notifications/unread

# Mark as read
curl -X POST -H "Authorization: Bearer TOKEN" \
  https://inkpaper.com/notifications/{id}/mark-as-read

# Get unread count
curl -H "Authorization: Bearer TOKEN" \
  https://inkpaper.com/notifications/unread-count
```

### Response Format

```json
{
    "status": "success",
    "data": {
        "data": [
            {
                "id": "uuid",
                "type": "article_published",
                "data": {
                    "author_name": "John Doe",
                    "article_title": "My Article",
                    "article_slug": "my-article"
                },
                "read_at": null,
                "created_at": "2026-07-03T10:00:00Z",
                "updated_at": "2026-07-03T10:00:00Z"
            }
        ],
        "current_page": 1,
        "total": 42,
        "per_page": 15
    }
}
```

## Frontend Components

### 1. Notification Bell Component

Location: `resources/views/components/notification-bell.blade.php`

A dropdown bell icon that shows:

- Unread notification badge
- List of recent unread notifications
- Mark all as read button
- Delete individual notifications

Usage in navbar:

```blade
@auth
    @include('components.notification-bell')
@endauth
```

### 2. Notifications Dashboard Page

Location: `resources/views/dashboard/notifications.blade.php`

Full-page notifications viewer with:

- Filter by all/unread
- Pagination (10 per page)
- Mark as read/unread
- Delete notifications
- Clear all notifications
- Human-readable timestamps

## Event Dispatching

Events are dispatched in the following scenarios:

### ArticlePublished

**Dispatched:** In `ArticleObserver::updated()` when article status changes to PUBLISHED
**Notifies:** All followers of the article author

### CommentPosted

**Dispatched:** In `CommentObserver::created()` when a comment is created
**Notifies:**

- Article author (if different from commenter)
- Parent comment author (if reply to comment)

### ArticleLiked

**Dispatched:** In `ArticleService::like()` when an article is liked
**Notifies:** Article author (if different from liker)

### UserFollowed

**Dispatched:** In `User::follow()` when user is followed
**Notifies:** The followed user

## Event Service Provider

Location: `app/Providers/EventServiceProvider.php`

Maps events to their listeners:

- Listeners are queued for async processing
- Uses Laravel's queue system (ensure `QUEUE_CONNECTION` is set)

## Usage Examples

### Automatically Send Notifications

The system works automatically once integrated. Simply:

1. **Publish an article** → Followers receive `article_published` notifications
2. **Comment on an article** → Author receives `comment_posted` notification
3. **Like an article** → Author receives `article_liked` notification
4. **Follow a user** → User receives `user_followed` notification

### Manual Notification Creation

For custom notifications:

```php
use App\Models\Notification;

Notification::create([
    'user_id' => $userId,
    'type' => 'custom_notification',
    'notifiable_type' => 'App\\Models\\Article',
    'notifiable_id' => $articleId,
    'data' => json_encode(['custom_field' => 'value']),
]);
```

## Configuration

### Queue Setup

Ensure your `.env` file has:

```
QUEUE_CONNECTION=database
```

Or use your preferred queue driver (redis, sync, etc.)

### Refresh Interval

The notification bell updates unread count every 30 seconds. To change:

Edit `resources/views/components/notification-bell.blade.php` line 126:

```javascript
setInterval(updateUnreadCount, 30000); // Change 30000 to desired milliseconds
```

## Testing

### Test Event Dispatch

```php
use App\Events\ArticlePublished;
use Illuminate\Support\Facades\Event;

// In your test:
Event::fake();

// Perform action
$article->publish();

// Assert event was dispatched
Event::assertDispatched(ArticlePublished::class);
```

### Manual API Testing

Use Postman or similar tool:

1. **Authenticate** - Get bearer token
2. **GET** `/notifications/unread-count` - Check unread count
3. **GET** `/notifications?per_page=5` - Fetch 5 notifications
4. **POST** `/notifications/{id}/mark-as-read` - Mark as read
5. **DELETE** `/notifications/{id}` - Delete notification

## Performance Considerations

1. **Database Indexing** - `notifications` table has index on `(user_id, read_at)` for fast queries
2. **Pagination** - Default 15 per page, configurable via API
3. **Async Processing** - Listeners are queued to avoid blocking
4. **Read State** - Uses `read_at` timestamp for efficient filtering

## Troubleshooting

### Notifications Not Appearing

1. **Check Queue** - Ensure queue worker is running:

    ```bash
    php artisan queue:work
    ```

2. **Check Database** - Verify notifications table exists:

    ```bash
    php artisan migrate
    ```

3. **Check Events** - Verify events are being dispatched by checking logs

4. **Check Listeners** - Ensure listeners are properly registered in EventServiceProvider

### Slow API Response

- Check database indexes on `notifications` table
- Consider caching unread count
- Implement limit on pagination

## Future Enhancements

1. **WebSocket Support** - Real-time updates using Laravel Echo
2. **Email Notifications** - Send emails for important notifications
3. **Push Notifications** - Mobile push notifications
4. **Notification Preferences** - Let users customize which notifications they receive
5. **Notification Templates** - Configurable notification messages
6. **Bulk Operations** - Archive/categorize notifications by type

## Related Files

- Routes: `routes/web.php`
- Observers: `app/Observers/ArticleObserver.php`, `CommentObserver.php`
- Services: `app/Services/ArticleService.php`
- Models: `app/Models/User.php`, `Notification.php`

---

**Last Updated:** July 3, 2026
**System:** Ink & Paper v1.0
