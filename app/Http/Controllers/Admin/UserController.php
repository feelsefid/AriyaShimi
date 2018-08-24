<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Bican;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->cannot('view.user')) {
            return view('errors.permission');
            die;
        }

        $data = User::with('roles');

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_name'))) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('srch_name') . '%');
        }
        if(!empty($request->input('srch_email'))) {
            $data = $data->where('email', 'LIKE', '%' . $request->input('srch_email') . '%');
        }
        if(!empty($request->input('srch_language'))) {
            $data = $data->where('language', $request->input('srch_language'));
        }
        if(!empty($request->input('srch_status'))) {
            $data = $data->where('status', $request->input('srch_status'));
        }
        if(!Auth::user()->isRole('admin')) {
            $data = $data->where('id', '>', 1);
        }

        //## Sort By Column ############################################################################################
        if(!empty($request->input('srch_name_sort'))) {
            $data = $data->orderBy('name', $request->input('srch_name_sort'));
        }
        elseif(!empty($request->input('srch_email_sort'))) {
            $data = $data->orderBy('email', $request->input('srch_email_sort'));
        }
        elseif(!empty($request->input('srch_language_sort'))) {
            $data = $data->orderBy('language', $request->input('srch_language_sort'));
        }
        else {
            $data = $data->orderBy('name', 'desc');
        }

        //## Paginate ##################################################################################################
        $paginate = 20;
        if(!empty($request->input('srch_paginate'))) {
            $paginate = $request->input('srch_paginate') == '*' ?  $data->count() : $request->input('srch_paginate');
        }

        $data = $data->paginate($paginate);

        $filter = $request->except('_token');
        $filter['srch_paginate'] = $paginate;

        if ($request->ajax()) {
            return response()->json(View::make('admin.user.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                ])->render());
        }

        $roles = Role::pluck('name', 'id');
        return view('admin.user.index', compact('data', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->cannot('create.user')) {
            return view('errors.permission');
            die;
        }

        /*if(!accessIp(\Request::ip())) {
            return view('errors.blocked_ip');
            die;
        }*/

        $roles = Role::pluck('name', 'id');
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('confirm-password', 'roles');

        $messages = [
            'name.required' => trans('user.err_name_required'),
            'email.required' => trans('user.err_email_required'),
            'email.unique' => trans('user.err_email_unique'),
            'password.required' => trans('user.err_password_required'),
            'password.min' => trans('user.err_password_min'),
            'password.confirmed' => trans('user.err_password_confirmed'),
            'password_confirmation.required' => trans('user.err_password_confirmation_required'),
            'roles.required' => trans('user.err_roles_required')
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'roles' => 'required',
        ], $messages);

        if($validator->fails()){
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return \Redirect::back()->withInput()->withErrors($validator);
        }

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        foreach ($request->input('roles') as $key => $value) {
            $user->attachRoles($value);
        }

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/user')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/user/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/user/' . $user->id . '/edit')]);
            }
        }
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
    public function edit($id)
    {
        if(Auth::user()->cannot('edit.user')) {
            return view('errors.permission');
            die;
        }

        /*if(!accessIp(\Request::ip())) {
            return view('errors.blocked_ip');
            die;
        }*/

        $roles = new Role();
        if(!Auth::user()->isRole('admin')) {
            $roles = $roles->where('id', '>', 1);
        }

        $roles = $roles->pluck('name', 'id');
        $data = User::with('roles')->find($id);

        foreach($data->roles as $role) {
            $selected_roles[] = $role->id;
        }

        return view('admin.user.edit', compact('roles', 'data', 'selected_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => trans('user.err_name_required'),
            'email.required' => trans('user.err_email_required'),
            'email.unique' => trans('user.err_email_unique'),
            'password.required' => trans('user.err_password_required'),
            'password.min' => trans('user.err_password_min'),
            'password.confirmed' => trans('user.err_password_confirmed'),
            'password_confirmation.required' => trans('user.err_password_confirmation_required'),
            'roles.required' => trans('user.err_roles_required')
        ];
        $user = User::find($id);
        $input = $request->all();

        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'roles' => 'required',
        ];

        if(!empty($request->input('password'))) {
            $rules['password'] = 'required|min:6|confirmed';
            $rules['password_confirmation'] = 'required';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return \Redirect::back()->withInput()->withErrors($validator);
        }

        if(!empty($request->input('password'))) {
            $user->password = Hash::make($input['password']);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status = $request->input('status');
        $user->language = $request->input('language');
        $user->save();


        if(!$request->has('id')) {
            $user->detachRoles();

            foreach ($request->input('roles') as $key => $value) {
                $user->attachRoles($value);
            }
        }
        //return var_dump($request->ajax());die;
        return redirect()->back();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/user')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/user/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/user/' . $user->id . '/edit')]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->cannot('delete.user')) {
            return view('errors.permission');
            die;
        }

        /*if(!accessIp(\Request::ip())) {
            return view('errors.blocked_ip');
            die;
        }*/

        $ids = explode(',', $id);
        if(count($ids) < 1) {
            return response()->json([
                'hasError' => true,
                'errorMsg' => trans('general.no_items_selected')
            ]);
        }

        foreach ($ids as $id) {
            $canDelete[] = $id;
            User::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = User::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }
}
