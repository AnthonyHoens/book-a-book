<?php

namespace App\Http\Controllers;


use App\Events\UpdateAccountEvent;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use App\Traits\CreatingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class ProfilController extends Controller
{
    use CreatingImage;

    public function show(User $user)
    {
        $groups = Group::all();

        return view('app.student.profil.show', compact('user', 'groups'));
    }

    public function update(UpdateProfilRequest $request, User $user)
    {
        $validatedData = $request->validated();

        $group = GroupUser::where('user_id', '=', $user->id)->first();
        $group->group_id = $request['group'];
        $group->save();

        $user->name = $validatedData['name'];
        $user->first_name = $validatedData['firstName'];
        $user->email = $validatedData['email'];

        if ($request->hasFile('file')) {
            $this->saveUser($request);

            $user->image = $user->slug .'.'. $request->file('file')->extension();
        }

        $user->save();

        event(new UpdateAccountEvent($user));

        return redirect(route('profile.show', $user->slug));
    }
}
