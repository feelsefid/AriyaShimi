<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Deg360;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class Deg360Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->cannot('view.article')) {
            return response()->redirectTo('errors/permission');
        }

        $data = new Deg360();

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

        $categories = ArticleCategory::pluck('name', 'id');

        if ($request->ajax()) {
            return response()->json(View::make('admin.deg360.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                    'categories' => $categories,
                ])->render());
        }

        return view('admin.deg360.index', compact('data', 'filter', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->cannot('create.article')) {
            return response()->redirectTo('errors/permission');
        }

        return view('admin.deg360.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
            'internal_images_small' => 'required',
            'internal_images_large' => 'required',
        ];

        $messages = [
            'name.required' => trans('general.err_name_required'),
            'internal_images_small.required' => trans('deg360.err_internal_images_small_required'),
            'internal_images_large.required' => trans('deg360.err_internal_images_large_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        ################################################################################################################
        $path_small = 'deg360/' . time() . '/small';
        $path_large = 'deg360/' . time() . '/large';

        if (!File::exists($path_small)) {
            File::makeDirectory($path_small, $mode = 0777, true, true);

            if (!File::exists($path_small . "/index.html")) {
                fopen($path_small . "/index.html", "x");
            }
        }

        if (!File::exists($path_large)) {
            File::makeDirectory($path_large, $mode = 0777, true, true);

            if (!File::exists($path_large . "/index.html")) {
                fopen($path_large . "/index.html", "x");
            }
        }
        $large = public_path(substr($request->input('internal_images_large'),20));
        Zipper::make($large)->extractTo($path_large);
        //return "ok";
        $small = public_path(substr($request->input('internal_images_small'),20));
        Zipper::make($small)->extractTo($path_small);

        $model = new Deg360();

        $model->name = $request->input('name');

        $model->internal_images_small = $path_small;
        $model->internal_images_large = $path_large;

        if(!empty($request->get('description')))
            $model->description = $request->get('description');

        if(!empty($request->get('image')))
            $model->image = $request->get('image');

        $model->status = $request->input('status');
        $model->language = $request->input('language');

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/deg360')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/deg360/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/deg360/' . $model->id . '/edit')]);
            }
        }
        
        return redirect()->back();
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

        $data = Deg360::find($id);
        $categories = ArticleCategory::pluck('name', 'id');
        //return $categories;
        return view('admin.deg360.edit', compact('data', 'categories'));
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
        if(auth()->user()->cannot('edit.article')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required',
            'internal_images_small' => 'required',
            'internal_images_large' => 'required',
        ];

        $messages = [
            'name.required' => trans('general.err_name_required'),
            'internal_images_small.required' => trans('deg360.err_internal_images_small_required'),
            'internal_images_large.required' => trans('deg360.err_internal_images_large_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $model = Deg360::find($id);

        ################################################################################################################
        $path_large = $model->internal_images_large;
        $path_small = $model->internal_images_small;
        //return $model->internal_images_large;
        ################################################################################################################
        $large = public_path(substr($request->input('internal_images_large'),20));
        $explode=explode('.',$large);
        if(end($explode)=='zip'){
            if (substr($path_large, strlen($path_large) - 1, 1) != '/') {
                $path_large .= '/';
            }
            $files = glob($path_large . '*', GLOB_MARK);
            var_dump($files);die();
            foreach ($files as $file) {
                if (is_dir($file)) {
                    rmdir($file);
                } else {
                    unlink($file);
                }
            }
            rmdir(url($path_large));

            if (!File::exists($path_large)) {
                File::makeDirectory($path_large, $mode = 0777, true, true);

                if (!File::exists($path_large . "/index.html")) {
                    fopen($path_large . "/index.html", "x");
                }
            }
        
            Zipper::make($large)->extractTo($path_large);
        }

        ################################################################################################################
        $small = public_path(substr($request->input('internal_images_small'),20));
        $explode=explode('.',$small);
        if(end($explode)=='zip'){
            if (substr($path_small, strlen($path_small) - 1, 1) != '/') {
                $path_small .= '/';
            }
            $files = glob($path_small . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    rmdir($file);
                } else {
                    unlink($file);
                }
            }
            rmdir(url($path_small));

            if (!File::exists($path_small)) {
                File::makeDirectory($path_small, $mode = 0777, true, true);

                if (!File::exists($path_small . "/index.html")) {
                    fopen($path_small . "/index.html", "x");
                }
            }

            Zipper::make($small)->extractTo($path_small);
        }

        ################################################################################################################
        $model->name = $request->input('name');
        $model->internal_images_small = $path_small;
        $model->internal_images_large = $path_large;

        if(!empty($request->get('description')))
            $model->description = $request->get('description');

        if(!empty($request->get('image')))
            $model->image = $request->get('image');

        $model->status = $request->input('status');
        $model->language = $request->input('language');

        $model->save();

        ################################################################################################################
        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/deg360')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/deg360/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/deg360/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.article')) {
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
            Deg360::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = Deg360::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }
}
