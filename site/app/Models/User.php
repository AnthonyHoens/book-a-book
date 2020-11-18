<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'slug',
        'email',
        'group',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group() {
        return $this->hasOneThrough(Group::class, GroupUser::class, 'user_id', 'id', 'id', 'group_id');
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->roles->pluck('name')->contains('Admin');
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->first_name;
    }

    public function getIsOrderAdminAttribute(): bool
    {
        return $this->orders->pluck('user_id')->contains(Auth::id());
    }
}
