<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->cannot('view.user')) {
            return view('errors.permission');
        }

        $permission_role = Role::with('permissions')->paginate(20);
        $permission_user = User::with('permissions')->paginate(20);

        return view('admin.permission.index', compact('permission_role', 'permission_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function role_edit($id)
    {
        if(Auth::user()->cannot('edit.user')) {
            return view('errors.permission');
            die;
        }

        //-- Name of role
        $permission_role = Role::with('permissions')->find($id);

        //-- Permissions of asigned to selected role
        foreach ($permission_role->permissions as $pr) {
            $perms[] = $pr->id;
        }

        //-- All based permissions
        $permissions = Permission::where('language', App::getLocale())->get();
        foreach($permissions as $permission) {
            $data[$permission->model][$permission->description][] = $permission;
        }

        return view('admin.permission.edit_role', compact('data', 'perms', 'permission_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_edit($id)
    {
        if(Auth::user()->cannot('edit.permission')) {
            return view('errors.permission');
            die;
        }

        //-- Name of user
        $permission_user = User::with('permissions')->find($id);

        //-- Permissions of asigned to selected User
        foreach ($permission_user->permissions as $pr) {
            $perms[] = $pr->id;
        }

        //-- All based permissions
        $permissions = Permission::all();

        foreach($permissions as $permission) {
            $data[$permission->model][$permission->description][] = $permission;
        }

        return view('admin.permission.edit_user', compact('data', 'perms', 'permission_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function role_update(Request $request, $id)
    {
        $role = Role::find($id);

        $role->detachPermissions();

        if($request->input('perms')){
            foreach ($request->input('perms') as $key => $value) {
                $role->attachPermissions($value);
            }
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_update(Request $request, $id)
    {
        $user = User::find($id);

        $user->detachPermissions();

        if($request->input('perms')) {
            foreach ($request->input('perms') as $key => $value) {
                $user->attachPermissions($value);
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
