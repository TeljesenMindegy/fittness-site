<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles' => 'array',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function hasRole($role)
    {
        $chosen = \App\Models\Role::where('name', '=', $role)->get();
        $currentRoles = $this->roles()->get()->toArray();

        foreach($currentRoles as $value) {
            if ($value['id'] == $chosen->first()->toArray()['id']) {
                return true;
            }
        }
        return false;
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function getFullNameAttribute() {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getAvatarAttribute()
    {
        $gravatar_id = md5($this->email);
        return "https://gravatar.com/avatar/{$gravatar_id}";
    }
}
