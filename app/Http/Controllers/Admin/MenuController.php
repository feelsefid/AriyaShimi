<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->cannot('view.menu')) {
            return response()->redirectTo('errors/permission');
        }
        
        if($request->has('orderList')){
            foreach ($request->orderList as $item){
                $menu=Menu::find($item[0]);
                $menu->sort_order=$item[1];
                $menu->save();
            }
        }

        $data = Menu::orderBy('sort_order','asc')->with('menu_categories');

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_name'))) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('srch_name') . '%');
        }
        if(!empty($request->input('srch_menu_categories_id'))) {
            $data = $data->whereHas('menu_categories', function($q) use ($request) {
                $q->where('menu_categories_id', $request->input('srch_menu_categories_id'));
            });
        }
        if(!empty($request->input('srch_language'))) {
            $data = $data->where('language', $request->input('srch_language'));
        }
        if(!empty($request->input('srch_type'))) {
            $data = $data->where('type', $request->input('srch_type'));
        }
        if(!empty($request->input('srch_status'))) {
            $data = $data->where('status', $request->input('srch_status'));
        }

        //## Sort By Column ############################################################################################
        if(!empty($request->input('srch_name_sort'))) {
            $data = $data->orderBy('name', $request->input('srch_name_sort'));
        }
        elseif(!empty($request->input('srch_menu_categories_id_sort'))) {
            $data = $data->orderBy('menu_categories_id', $request->input('srch_menu_categories_id_sort'));
        }
        elseif(!empty($request->input('srch_language_sort'))) {
            $data = $data->orderBy('language', $request->input('srch_language_sort'));
        }
        elseif(!empty($request->input('srch_type_sort'))) {
            $data = $data->orderBy('type', $request->input('srch_type_sort'));
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

        $categories = MenuCategory::pluck('name', 'id');

        if ($request->ajax()) {
            return response()->json(View::make('admin.menu.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                    'categories' => $categories,
                ])->render());
        }

        return view('admin.menu.index', compact('data', 'filter', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->cannot('create.menu')) {
            return response()->redirectTo('errors/permission');
        }

        $categories = MenuCategory::pluck('name', 'id');
        $parents = Menu::pluck('name', 'id');

        return view('admin.menu.create', compact('categories', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->cannot('create.menu')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
            'slug' => 'required',
            'menu_categories_id' => 'required',
            'type' => 'required',
        ];

        if($request->input('type') != '') {
            $rules['link'] = 'required';
        }

        $messages = [
            'name.required' => trans('menu.err_name_required'),
            'slug.required' => trans('menu.err_slug_required'),
            'menu_categories_id.required' => trans('menu.err_menu_categories_id_required'),
            'type.required' => trans('menu.err_type_required'),
            'link.required' => trans('menu.err_link_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new Menu();

        if(!empty($request->input('parent_id')))
            $model->parent_id = $request->input('parent_id');

        $model->name = $request->input('name');
        $model->slug = $request->input('slug');
        $model->menu_categories_id = $request->input('menu_categories_id');
        $model->type = $request->input('type');
        $model->link = $request->input('link');

        if(!empty($request->input('image')))
            $model->image = $request->input('image');

        if(!empty($request->get('description')))
            $model->description = $request->get('description');

        $model->status = $request->input('status');
        $model->language = $request->input('language');
        $model->removable=1;
        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/menu')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/menu/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/menu/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('edit.menu')) {
            return response()->redirectTo('errors/permission');
        }

        $data = Menu::find($id);
        $parents = Menu::pluck('name', 'id');

        $modules = Module::where('status', 1)
            ->where('language', app()->getLocale())
            ->pluck('title', 'route');

        $categories = MenuCategory::pluck('name', 'id');
        $menu_level_1 = [];

        if($data->type == 'category') {
            $menu_level_1 = ArticleCategory::pluck('name', 'id');
        } else if($data->type == 'article') {
            $menu_level_1 = ArticleCategory::pluck('name', 'id');
            $link = Article::pluck('name', 'id');
        }

        return view('admin.menu.edit', compact(
            'data', 'categories', 'parents', 'menu_level_1', 'link', 'modules'
        ));
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
        if(auth()->user()->cannot('edit.menu')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
            'slug' => 'required',
            'menu_categories_id' => 'required',
            'type' => 'required',
        ];

        if($request->input('type') != '') {
            $rules['link'] = 'required';
        }

        $messages = [
            'name.required' => trans('menu.err_name_required'),
            'slug.required' => trans('menu.err_slug_required'),
            'menu_categories_id.required' => trans('menu.err_menu_categories_id_required'),
            'type.required' => trans('menu.err_type_required'),
            'link.required' => trans('menu.err_link_required'),
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = Menu::find($id);

        $model->parent_id = empty($request->input('parent_id')) ? 0 : $request->input('parent_id');
        $model->name = $request->input('name');
        $model->slug = $request->input('slug');
        $model->menu_categories_id = $request->input('menu_categories_id');
        $model->type = $request->input('type');
        $model->link = $request->has('link') ? $request->input('link') : '';

        if(!empty($request->input('image')))
            $model->image = $request->input('image');

        //return response()->json($request->get('description'));
        $model->description = $request->get('description');
        $model->status = $request->input('status');
        $model->language = $request->input('language');
        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/menu')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/menu/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/menu/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.menu')) {
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
            $hasChild = Menu::where('parent_id', $id)->count();
            if($hasChild > 0 || $id == 1) {
                $canNotDelete = Menu::find($id);
                return response()->json(['canNotDelete' => $canNotDelete, 'canNotDeleteId' => $id]);
            } else {
                $canDelete[] = $id;
                Menu::destroy($id);
            }
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = Menu::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }
}
