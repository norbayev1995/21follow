<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $allNotifications = auth()->user()->notifications;
        return view('notification.index', compact( 'allNotifications'));
    }

    public function read($id)
    {
        $notifications = auth()->user()->unreadNotifications->where('id', $id)->first();
        $notifications->markAsRead();
        return redirect()->back();
    }
}
