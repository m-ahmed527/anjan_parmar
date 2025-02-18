<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAllRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        toastr()->info('All notifications marked as read.');
        return back();
    }

    public function markRead($id)
    {
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        toastr()->info('notification marked as read .');
        return back();
    }
}
