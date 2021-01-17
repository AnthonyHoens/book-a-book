<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProfileImgCreateEvent;
use App\Events\UpdateAccountEvent;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateAdminProfilRequest;
use App\Models\GroupUser;
use App\Models\User;
use App\Traits\CreatingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfilController extends Controller
{
    use CreatingImage;

    public function show(User $user) {
        return view('app.admin.profil.show', compact('user'));
    }

    public function update(UpdateAdminProfilRequest $request,User $user) {
        $validatedData = $request->validated();

        $user->name = $validatedData['name'];
        $user->first_name = $validatedData['firstName'];
        $user->email = $validatedData['email'];

        if ($request->hasFile('file')) {
            $file = $request->file;
            //event(new ProfileImgCreateEvent($file));
            $this->saveUser($request);

            $user->image = $user->slug .'.'. $request->file('file')->extension();
        }

        $user->save();

        event(new UpdateAccountEvent($user));
        return redirect()->route('admin.profile.show', Auth::user()->slug);
    }
}
