<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
    public function index() {
        $notifications = Notification::orderByDesc('created_at')
            ->where('user_id', '=', Auth::id())
            ->paginate(10);

        return view('app.admin.notifs.index', compact('notifications'));
    }
}
