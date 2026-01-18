<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('order')
            ->latest()
            ->get();

        return view('notifications.index', compact('notifications'));
    }
}
