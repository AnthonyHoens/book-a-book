<?php

namespace App\Http\Controllers\Admin;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminHistoryController extends Controller
{
    public function index() {
        $histories = History::orderByDesc('created_at')
            ->where('user_id', '=', Auth::id())
            ->paginate(10);

        return view('app.admin.history.index', compact('histories'));
    }
}
