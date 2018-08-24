<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SlideShow;
use App\Models\SlideShowCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SlideShowController extends Controller
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
        if(auth()->user()->cannot('view.slide_show')) {
            return response()->redirectTo('errors/permission');
        }

        $data = SlideShow::with('slide_show_categories');

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_name'))) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('srch_name') . '%');
        }
        if(!empty($request->input('srch_slide_show_categories_id'))) {
            $data = $data->whereHas('slide_show_categories', function($q) use ($request) {
                $q->where('slide_show_categories_id', $request->input('srch_slide_show_categories_id'));
            });
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
        elseif(!empty($request->input('srch_slide_show_categories_id_sort'))) {
            $data = $data->orderBy('slide_show_categories_id', $request->input('srch_slide_show_categories_id_sort'));
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

        $categories = SlideShowCategory::pluck('name', 'id');

        if ($request->ajax()) {
            return response()->json(View::make('admin.slide_show.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                    'categories' => $categories,
                ])->render());
        }

        return view('admin.slide_show.index', compact('data', 'filter', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->cannot('create.slide_show')) {
            return response()->redirectTo('errors/permission');
        }

        $categories = SlideShowCategory::pluck('name', 'id');
        return view('admin.slide_show.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->cannot('create.slide_show')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'image' => 'required',
            'slide_show_categories_id' => 'required',
        ];

        $messages = [
            'name.required' => trans('slide_show.err_name_required'),
            'image.required' => trans('slide_show.err_image_required'),
            'slide_show_categories_id.required' => trans('slide_show.err_category_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new SlideShow();

        $model->name = $request->input('name');
        $model->slide_show_categories_id = $request->input('slide_show_categories_id');
        $model->image = $request->input('image');

        if(!empty($request->input('description')))
            $model->description = $request->input('description');

        $model->status = $request->input('status');
        $model->language = $request->input('language');
        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/slide_show')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/slide_show/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/slide_show/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('edit.slide_show')) {
            return response()->redirectTo('errors/permission');
        }

        $data = SlideShow::find($id);
        $categories = SlideShowCategory::pluck('name', 'id');
        return view('admin.slide_show.edit', compact('categories', 'data'));
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
        if(auth()->user()->cannot('edit.slide_show')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'image' => 'required',
            'slide_show_categories_id' => 'required',
        ];

        $messages = [
            'name.required' => trans('slide_show.err_name_required'),
            'image.required' => trans('slide_show.err_image_required'),
            'slide_show_categories_id.required' => trans('slide_show.err_category_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = SlideShow::find($id);

        $model->name = $request->input('name');
        $model->slide_show_categories_id = $request->input('slide_show_categories_id');
        $model->image = $request->input('image');

        if(!empty($request->input('description')))
            $model->description = $request->input('description');

        $model->status = $request->input('status');
        $model->language = $request->input('language');
        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/slide_show')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/slide_show/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/slide_show/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.slide_show')) {
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
            SlideShow::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = SlideShow::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }

    public function delete_row(Request $request, $id)
    {
        $data = SlideShow::find($id);
        $image = explode(',', $data->image);

        if(!empty($request->get('image'))) {
            if (($key = array_search($request->get('image'), $image)) !== false) {
                unset($image[$key]);
            }
            $data->image = implode(',', array_filter($image));
        }

        $data->save();

        return response()->json(true);
    }
}
