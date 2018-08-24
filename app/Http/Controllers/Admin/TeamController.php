<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->cannot('view.team')) {
            return response()->redirectTo('errors/permission');
        }

        $data = new Team();

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_name'))) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('srch_name') . '%');
        }
        if(!empty($request->input('srch_language'))) {
            $data = $data->where('language', $request->input('srch_language'));
        }
        if(!empty($request->input('srch_position'))) {
            $data = $data->where('position', $request->input('srch_position'));
        }
        if(!empty($request->input('srch_status'))) {
            $data = $data->where('status', $request->input('srch_status'));
        }

        //## Sort By Column ############################################################################################
        if(!empty($request->input('srch_name_sort'))) {
            $data = $data->orderBy('name', $request->input('srch_name_sort'));
        }
        elseif(!empty($request->input('srch_position_sort'))) {
            $data = $data->orderBy('position', $request->input('srch_position_sort'));
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
            return response()->json(View::make('admin.team.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                ])->render());
        }

        return view('admin.team.index', compact('data', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->cannot('create.team')) {
            return response()->redirectTo('errors/permission');
        }

        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->cannot('create.team')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'name.required' => trans('team.err_name_required'),
            'position.required' => trans('team.err_position_required'),
            'description.required' => trans('team.err_text_required')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new Team();

        $model->name = $request->input('name');
        $model->position = $request->input('position');
        $model->description = $request->input('description');

        if($request->has('image')) {
            $model->image = $request->input('image');
        }

        $model->status = $request->input('status');
        $model->language = $request->input('language');

        if($request->has('facebook'))
            $model->facebook = $request->input('facebook');

        if($request->has('telegram'))
            $model->telegram = $request->input('telegram');

        if($request->has('twitter'))
            $model->twitter = $request->input('twitter');

        if($request->has('instagram'))
            $model->instagram = $request->input('instagram');

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/team')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/team/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/team/' . $model->id . '/edit')]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->cannot('edit.team')) {
            return response()->redirectTo('errors/permission');
        }

        $data = Team::find($id);
        return view('admin.team.edit', compact('data'));
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
        if(auth()->user()->cannot('edit.team')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'name.required' => trans('team.err_name_required'),
            'position.required' => trans('team.err_position_required'),
            'description.required' => trans('team.err_text_required')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = Team::find($id);

        $model->name = $request->input('name');
        $model->position = $request->input('position');
        $model->description = $request->input('description');

        if($request->has('image')) {
            $model->image = $request->input('image');
        }

        $model->status = $request->input('status');
        $model->language = $request->input('language');

        if($request->has('facebook'))
            $model->facebook = $request->input('facebook');

        if($request->has('telegram'))
            $model->telegram = $request->input('telegram');

        if($request->has('twitter'))
            $model->twitter = $request->input('twitter');

        if($request->has('instagram'))
            $model->instagram = $request->input('instagram');

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/team')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/team/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/team/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.team')) {
            return response()->redirectTo('errors/permission');
        }

        $ids = explode(',', $id);
        if(count($ids) < 1) {
            return response()->json([
                'hasError' => true,
                'errorMsg' => trans('general.no_items_selected')
            ]);
        }

        foreach ($ids as $id) {
            $canDelete[] = $id;
            Team::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = Team::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }
}
