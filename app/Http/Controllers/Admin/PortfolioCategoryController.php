<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PortfolioCategoryController extends Controller
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
        if(auth()->user()->cannot('view.portfolio_category')) {
            return response()->redirectTo('errors/permission');
        }

        $data = new PortfolioCategory();

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
                $parents = PortfolioCategory::where('id', $row->parent_id)->first()->name;
                $row->parents = $parents;
            }
        }

        $filter = $request->except('_token');
        $filter['srch_paginate'] = $paginate;

        if ($request->ajax()) {
            return response()->json(View::make('admin.portfolio_category.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                ])->render());
        }

        return view('admin.portfolio_category.index', compact('data', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = PortfolioCategory::orderBy('sort_order')->pluck('name', 'id');

        return view('admin.portfolio_category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->cannot('create.portfolio_category')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => trans('portfolio.err_category_title_required')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new PortfolioCategory();

        if(!empty($request->input('parent_id')))
            $model->parent_id = $request->input('parent_id');

        $model->name = $request->input('name');

        if(count($request->input('image')) > 0) {
            $images = implode(',', array_filter($request->input('image')));
            $model->image = $images;
        }

        if(!empty($request->input('text')))
            $model->text = $request->get('text');

        $model->status = $request->input('status');
        $model->removable=1;
        $model->language = $request->input('language');
        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/portfolio_category')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/portfolio_category/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/portfolio_category/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('edit.portfolio_category')) {
            return response()->redirectTo('errors/permission');
        }

        $data = PortfolioCategory::find($id);
        $category = PortfolioCategory::orderBy('sort_order')->pluck('name', 'id');

        return view('admin.portfolio_category.edit', compact('data', 'category'));
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
        if(auth()->user()->cannot('edit.portfolio_category')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => trans('portfolio.err_category_title_required')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = PortfolioCategory::find($id);

        if(!empty($request->input('parent_id')))
            $model->parent_id = $request->input('parent_id');

        $model->name = $request->input('name');

        if(count($request->input('image')) > 0) {
            $images = implode(',', array_filter($request->input('image')));
            $model->image = $images;
        }

        $model->text = $request->get('text');
        $model->status = $request->input('status');
        $model->language = $request->input('language');
        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/portfolio_category')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/portfolio_category/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/portfolio_category/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.portfolio_category')) {
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
            $hasChild = PortfolioCategory::where('parent_id', $id)->count();
            $hasPortfolio = Portfolio::where('portfolio_categories_id', $id)->count();
            if($hasChild > 0 || $hasPortfolio > 0) {
                $canNotDelete = PortfolioCategory::find($id);
                return response()->json(['canNotDelete' => $canNotDelete]);
            } else {
                $canDelete[] = $id;
                PortfolioCategory::destroy($id);
            }
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function has_submenu($parent_id) {
        $has_submenu = PortfolioCategory::where('parent_id', $parent_id)->count();
        if($has_submenu > 0)
            return true;

        return false;
    }

    public function display_submenu($parent_id) {
        $submenu = PortfolioCategory::where('parent_id', $parent_id)
            ->get()
            ->toArray();

        return $submenu;
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = PortfolioCategory::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }

    public function delete_row(Request $request, $id)
    {
        $data = PortfolioCategory::find($id);
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
