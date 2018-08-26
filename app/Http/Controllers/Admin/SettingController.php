<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SettingController extends Controller
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
        if(auth()->user()->cannot('view.setting')) {
            return response()->redirectTo('errors/permission');
        }

        $data = new Setting();

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_title'))) {
            $data = $data->where('title', 'LIKE', '%' . $request->input('srch_title') . '%');
        }
        if(!empty($request->input('srch_language'))) {
            $data = $data->where('language', $request->input('srch_language'));
        }
        if(!empty($request->input('srch_status'))) {
            $data = $data->where('status', $request->input('srch_status'));
        }

        //## Sort By Column ############################################################################################
        if(!empty($request->input('srch_title_sort'))) {
            $data = $data->orderBy('title', $request->input('srch_title_sort'));
        }
        elseif(!empty($request->input('srch_language_sort'))) {
            $data = $data->orderBy('language', $request->input('srch_language_sort'));
        }
        else {
            $data = $data->orderBy('title', 'desc');
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
            return response()->json(View::make('admin.setting.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                ])->render());
        }

        return view('admin.setting.index', compact('data', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->cannot('create.setting')) {
            return response()->redirectTo('errors/permission');
        }

        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->cannot('create.setting')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'title' => 'required',
        ];

        $messages = [
            'title.required' => trans('setting.err_name_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new Setting();

        $model->title = $request->input('title');

        if(count($request->input('socials')) > 0) {
            $socials = json_encode(array_filter($request->input('socials')), JSON_UNESCAPED_UNICODE);
            $model->socials = $socials;
        }

        if(count($request->input('phone')) > 0) {
            $i = 0;
            $newObject = new \stdClass();
            foreach ($request->input('phone') as $row) {
                $newObject->$i = $row;
                $i++;
            }

            $model->phone = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        }

        if(count($request->input('fax')) > 0) {
            $i = 0;
            $newObject = new \stdClass();
            foreach ($request->input('fax') as $row) {
                $newObject->$i = $row;
                $i++;
            }

            $model->fax = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        }

        if(count($request->input('address')) > 0) {
            $i = 0;
            $newObject = new \stdClass();
            foreach ($request->input('address') as $row) {
                $newObject->$i = $row;
                $i++;
            }

            $model->address = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        }

        if(count($request->input('email')) > 0) {
            $i = 0;
            $newObject = new \stdClass();
            foreach ($request->input('email') as $row) {
                $newObject->$i = $row;
                $i++;
            }

            $model->email = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        }

        if($request->has('under_construction')) {
            $model->under_construction = $request->input('under_construction');
        }

        if($request->has('under_construction_text')) {
            $model->under_construction_text = $request->input('under_construction_text');
        }

        if($request->has('logo')) {
            $model->logo = $request->input('logo');
        }
        if($request->has('logo2')) {
            $model->logo2 = $request->input('logo2');
        }

        if($request->has('favicon')) {
            $model->favicon = $request->input('favicon');
        }

        $model->status = $request->input('status');
        $model->language = $request->input('language');

        if($request->has('title_seo'))
            $model->title_seo = $request->input('title_seo');

        if($request->has('keyword_seo'))
            $model->keyword_seo = $request->input('keyword_seo');

        if($request->has('description_seo'))
            $model->description_seo = $request->input('description_seo');

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/setting')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/setting/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/setting/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('edit.setting')) {
            return response()->redirectTo('errors/permission');
        }

        $data = Setting::find($id);

        return view('admin.setting.edit', compact('data'));
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
        if(auth()->user()->cannot('edit.setting')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'title' => 'required',
        ];

        $messages = [
            'title.required' => trans('setting.err_name_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = Setting::find($id);

        $model->title = $request->input('title');
        $model->status = $request->input('status');
        $model->about = $request->input('about');
        if(count($request->input('socials')) > 0) {
            $socials = json_encode(array_filter($request->input('socials')), JSON_UNESCAPED_UNICODE);
            $model->socials = $socials;
        }

        if(count($request->input('phone')) > 0) {
            $i = 0;
            $newObject = new \stdClass();
            foreach ($request->input('phone') as $row) {
                $newObject->$i = $row;
                $i++;
            }

            $model->phone = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        }

        if(count($request->input('fax')) > 0) {
            $i = 0;
            $newObject = new \stdClass();
            foreach ($request->input('fax') as $row) {
                $newObject->$i = $row;
                $i++;
            }

            $model->fax = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        }

        if(count($request->input('address')) > 0) {
            $i = 0;
            $newObject = new \stdClass();
            foreach ($request->input('address') as $row) {
                $newObject->$i = $row;
                $i++;
            }

            $model->address = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        }

        if(count($request->input('email')) > 0) {
            $i = 0;
            $newObject = new \stdClass();
            foreach ($request->input('email') as $row) {
                $newObject->$i = $row;
                $i++;
            }

            $model->email = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        }

        if($request->has('under_construction')) {
            $model->under_construction = $request->input('under_construction');
        }

        if($request->has('under_construction_text')) {
            $model->under_construction_text = $request->input('under_construction_text');
        }

        if($request->has('logo')) {
            $model->logo = $request->input('logo');
        }
        if($request->has('logo2')) {
            $model->logo2 = $request->input('logo2');
        }

        if($request->has('favicon')) {
            $model->favicon = $request->input('favicon');
        }

        $model->language = $request->input('language');

        if($request->has('title_seo'))
            $model->title_seo = $request->input('title_seo');

        if($request->has('keyword_seo'))
            $model->keyword_seo = $request->input('keyword_seo');

        if($request->has('description_seo'))
            $model->description_seo = $request->input('description_seo');

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/setting')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/setting/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/setting/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.setting')) {
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
            Setting::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function delete_row(Request $request, $id)
    {
        $data = Setting::find($id);
        $field = $request->get('field');
        $object = json_decode($data->$field);
        $target = $request->get('target');
        unset($object->$target);
        $i = 0;
        $newObject = new \stdClass();
        foreach ($object as $row) {
            $newObject->$i = $row;
            $i++;
        }
        if(count((array)$newObject) > 0) {
            $data->$field = json_encode($newObject, JSON_UNESCAPED_UNICODE);
        } else {
            $data->$field = null;
        }

        $data->save();
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = Setting::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }
}
