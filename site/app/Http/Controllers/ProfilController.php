<?php

namespace App\Http\Controllers;


use App\Events\UpdateAccountEvent;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show(User $user)
    {
        return view('app.student.profil.index', compact('user'));
    }

    public function update(UpdateProfilRequest $request, User $user)
    {
        $validatedData = $request->validated();

        $user->name = $validatedData['name'];
        $user->first_name = $validatedData['firstName'];
        $user->email = $validatedData['email'];
        $user->group = $validatedData['group'];

        $user->save();

        event(new UpdateAccountEvent($user));

        return redirect(route('profile.show', $user->slug));
    }
}
