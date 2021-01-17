<?php

namespace App\Actions\Fortify;

use App\Events\NewUserEvent;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Order;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Traits\OrderNumber;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use OrderNumber;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */


    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'group' => '',
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'first_name' => $input['firstName'],
            'slug' => Str::slug($input['name'] . ' ' . $input['firstName']),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $group = GroupUser::create([
            'user_id' => $user->id,
            'group_id' => $input['group'],
        ]);

        $role = RoleUser::create([
            'user_id' => $user->id,
            'role_id' => 3,
        ]);

        event(new NewUserEvent($user));

        return $user;
    }
}
