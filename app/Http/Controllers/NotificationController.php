<?php

namespace App\Http\Controllers;

use App\Enums\ResponseStatus;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function view()
    {
        $notifications = auth()->user()->notifications()->latest()->get();

        return view('public.notifications', compact('notifications'));
    }

    /**
     * Get all notifications for the authenticated user (paginated)
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 15);
        $notifications = auth()->user()
            ->notifications()
            ->latest()
            ->paginate($perPage);

        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'The notifications have been fetched successfully', [], $notifications);
    }

    /**
     * Get unread notification count
     */
    public function unreadCount(): JsonResponse
    {
        $count = auth()->user()->notifications()->whereNull('read_at')->count();

        return response()->json([
            'status' => 'success',
            'unread_count' => $count,
        ]);
    }

    /**
     * Get only unread notifications
     */
    public function unread(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 15);
        $notifications = auth()->user()
            ->notifications()
            ->whereNull('read_at')
            ->latest()
            ->paginate($perPage);

        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'The unread notifications have been fetched successfully', [], $notifications);
    }

    /**
     * Mark a single notification as read
     */
    public function markAsRead(Notification $notification): JsonResponse
    {
        // Authorize: only the user who received the notification can mark it
        if ($notification->notifiable_id !== auth()->id()) {
            return $this->respondGeneral(ResponseStatus::ERROR, 403, 'Unauthorized', [], []);
        }

        $notification->update(['read_at' => now()]);

        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'The Notification marked as read', [], $notification);
    }

    /**
     * Mark a single notification as unread
     */
    public function markAsUnread(Notification $notification): JsonResponse
    {
        // Authorize
        if ($notification->notifiable_id !== auth()->id()) {
            return $this->respondGeneral(ResponseStatus::ERROR, 403, 'Unauthorized', [], []);
        }

        $notification->update(['read_at' => null]);

        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'The Notification marked as unread', [], $notification);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead(): JsonResponse
    {
        auth()->user()
            ->notifications()
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'The All notifications marked as read');
    }

    /**
     * Delete a single notification
     */
    public function destroy(Notification $notification): JsonResponse
    {
        // Authorize
        if ($notification->notifiable_id !== auth()->id()) {
            return $this->respondGeneral(ResponseStatus::ERROR, 403, 'Unauthorized');
        }

        $notification->delete();

        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'The notification has been deleted successfully');
    }

    /**
     * Delete all notifications
     */
    public function deleteAll(): JsonResponse
    {
        auth()->user()->notifications()->delete();

        return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'The notifications have been deleted successfully');
    }
}
