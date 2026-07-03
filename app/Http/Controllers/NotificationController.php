<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
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

        return response()->json([
            'status' => 'success',
            'data' => $notifications,
        ]);
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

        return response()->json([
            'status' => 'success',
            'data' => $notifications,
        ]);
    }

    /**
     * Mark a single notification as read
     */
    public function markAsRead(Notification $notification): JsonResponse
    {
        // Authorize: only the user who received the notification can mark it
        if ($notification->user_id !== auth()->id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 403);
        }

        $notification->update(['read_at' => now()]);

        return response()->json([
            'status' => 'success',
            'message' => 'Notification marked as read',
            'data' => $notification,
        ]);
    }

    /**
     * Mark a single notification as unread
     */
    public function markAsUnread(Notification $notification): JsonResponse
    {
        // Authorize
        if ($notification->user_id !== auth()->id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 403);
        }

        $notification->update(['read_at' => null]);

        return response()->json([
            'status' => 'success',
            'message' => 'Notification marked as unread',
            'data' => $notification,
        ]);
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

        return response()->json([
            'status' => 'success',
            'message' => 'All notifications marked as read',
        ]);
    }

    /**
     * Delete a single notification
     */
    public function destroy(Notification $notification): JsonResponse
    {
        // Authorize
        if ($notification->user_id !== auth()->id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 403);
        }

        $notification->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Notification deleted',
        ]);
    }

    /**
     * Delete all notifications
     */
    public function deleteAll(): JsonResponse
    {
        auth()->user()->notifications()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'All notifications deleted',
        ]);
    }
}
