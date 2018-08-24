<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public $timestamps = false;

    public static $rules = ['role_id' => 'required', 'name' => 'required'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The users that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('User');
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
