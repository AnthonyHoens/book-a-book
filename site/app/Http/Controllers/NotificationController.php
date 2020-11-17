<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Notification::orderByDesc('created_at')
            ->where('user_id', '=', Auth::id())
            ->paginate(10);

        return view('app.student.notifs.index', compact('notifications'));
    }
}
