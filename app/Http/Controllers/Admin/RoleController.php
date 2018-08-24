<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->cannot('view.role')) {
            return view('errors.permission');
            die;
        }

        $data = new Role();

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_name'))) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('srch_name') . '%');
        }
        if(!empty($request->input('srch_slug'))) {
            $data = $data->where('slug', 'LIKE', '%' . $request->input('srch_slug') . '%');
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
        elseif(!empty($request->input('srch_slug_sort'))) {
            $data = $data->orderBy('slug', $request->input('srch_slug_sort'));
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
            return response()->json(View::make('admin.role.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                ])->render());
        }

        return view('admin.role.index', compact('data', 'filter'));
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

        $permissions = Permission::pluck('name', 'id');

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => trans('user.err_name_required'),
            'slug.required' => trans('user.err_role_slug_required'),
            'slug.unique' => trans('user.err_role_slug_unique')
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:roles,slug',
        ], $messages);

        if($validator->fails()){
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return \Redirect::back()->withInput()->withErrors($validator);
        }

        $role = new Role();
        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        if($request->has('description'))
            $role->description = $request->input('description');
        $role->status = $request->input('status');
        $role->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/role')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/role/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/role/' . $role->id . '/edit')]);
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

        $data = Role::find($id);

        return view('admin.role.edit', compact('data'));
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
            'name.required' => trans('user.err_role_title_required'),
            'slug.required' => trans('user.err_role_slug_required'),
        ];
        $role = Role::find($id);

        $rules = [
            'name' => 'required',
            'slug' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return \Redirect::back()->withInput()->withErrors($validator);
        }

        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        if($request->has('description'))
            $role->description = $request->input('description');
        $role->status = $request->input('status');
        $role->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/role')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/role/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/role/' . $role->id . '/edit')]);
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
            Role::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = Role::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }
}
