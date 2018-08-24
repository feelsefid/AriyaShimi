<?php

namespace App\Models;

use Bican\Roles\Traits\HasRoleAndPermission;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;
    use  HasRoleAndPermission, Notifiable, CanResetPassword;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'language'
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
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function attachRoles($roles) {
        $this->roles()->attach($roles);
    }

    public function detachRoles() {
        $this->roles()->detach();
    }

    /**
     * The roles that belong to the user.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }

    public function attachPermissions($permissions) {
        $this->permissions()->attach($permissions);
    }

    public function detachPermissions() {
        $this->permissions()->detach();
    }
}
