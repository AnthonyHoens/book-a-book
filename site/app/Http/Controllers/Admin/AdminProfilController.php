<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class AdminProfilController extends Controller
{
    public function show(User $user) {
        return view('app.admin.profil.show', compact('user'));
    }
}
