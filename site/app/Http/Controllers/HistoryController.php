<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{

    // TODO: Associer un livre à son auteur et récupérer le prix du livre

    public function index() {
        $histories = History::orderByDesc('created_at')
            ->where('user_id', '=', Auth::id())
            ->paginate(10);

        return view('app.student.history.index', compact('histories'));
    }
}
