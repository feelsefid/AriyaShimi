<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    /**
     * The users that belong to the role.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * The users that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
