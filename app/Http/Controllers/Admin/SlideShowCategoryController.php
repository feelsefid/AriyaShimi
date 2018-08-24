<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SlideShowCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SlideShowCategoryController extends Controller
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
        if(auth()->user()->cannot('view.slide_show_category')) {
            return response()->redirectTo('errors/permission');
        }

        $data = new SlideShowCategory();

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_name'))) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('srch_name') . '%');
        }
        if(!empty($request->input('srch_language'))) {
            $data = $data->where('language', $request->input('srch_language'));
        }
        if(!empty($request->input('srch_status'))) {
            $data = $data->where('status', $request->input('srch_status'));
        }

        //## Sort By Column ############################################################################################
        if(!empty($request->input('srch_name_sort'))) {
            $data = $data->orderBy('name', $request->input('srch_name_sort'));
        }
        else if(!empty($request->input('srch_language_sort'))) {
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

        foreach ($data as $row) {
            if(!empty($row->parent_id)) {
                $parents = SlideShowCategory::where('id', $row->parent_id)->first()->name;
                $row->parents = $parents;
            }
        }

        $filter = $request->except('_token');
        $filter['srch_paginate'] = $paginate;

        if ($request->ajax()) {
            return response()->json(View::make('admin.slide_show_category.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                ])->render());
        }

        return view('admin.slide_show_category.index', compact('data', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->cannot('create.slide_show_category')) {
            return response()->redirectTo('errors/permission');
        }

        $categories = SlideShowCategory::pluck('name', 'id');

        return view('admin.slide_show_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->cannot('create.slide_show_category')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => trans('slide_show.err_category_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new SlideShowCategory();

        if(!empty($request->input('parent_id')))
            $model->parent_id = $request->input('parent_id');

        $model->name = $request->input('name');

        if(count($request->input('image')) > 0) {
            $images = implode(',', array_filter($request->input('image')));
            $model->image = $images;
        }

        $model->status = $request->input('status');
        $model->language = $request->input('language');

        if(!empty($request->input('description'))) {
            $model->description = $request->input('description');
        }

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/slide_show_category')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/slide_show_category/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/slide_show_category/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('edit.slide_show_category')) {
            return response()->redirectTo('errors/permission');
        }

        $data = SlideShowCategory::find($id);

        $categories = SlideShowCategory::pluck('name', 'id');

        return view('admin.slide_show_category.edit', compact('categories', 'data'));
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
        if(auth()->user()->cannot('edit.slide_show_category')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => trans('slide_show.err_category_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = SlideShowCategory::find($id);

        if(!empty($request->input('parent_id')))
            $model->parent_id = $request->input('parent_id');

        $model->name = $request->input('name');

        if(count($request->input('image')) > 0) {
            $images = implode(',', array_filter($request->input('image')));
            $model->image = $images;
        }

        $model->status = $request->input('status');
        $model->language = $request->input('language');

        if(!empty($request->input('description'))) {
            $model->description = $request->input('description');
        }

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/slide_show_category')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/slide_show_category/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/slide_show_category/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.slide_show_category')) {
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
            SlideShowCategory::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = SlideShowCategory::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }

    public function delete_row(Request $request, $id)
    {
        $data = SlideShowCategory::find($id);
        $image = explode(',', $data->image);
        $thumb = explode(',', $data->thumb);
        $video = explode(',', $data->video);

        if(!empty($request->get('image'))) {
            if (($key = array_search($request->get('image'), $image)) !== false) {
                unset($image[$key]);
            }
            $data->image = implode(',', array_filter($image));
        }

        if(!empty($request->get('thumb'))) {
            if (($key = array_search($request->get('thumb'), $thumb)) !== false) {
                unset($thumb[$key]);
            }
            $data->thumb = implode(',', array_filter($thumb));
        }

        if(!empty($request->get('video'))) {
            if (($key = array_search($request->get('video'), $video)) !== false) {
                unset($video[$key]);
            }
            $data->video = implode(',', array_filter($video));
        }

        $data->save();

        return response()->json(true);
    }
}
