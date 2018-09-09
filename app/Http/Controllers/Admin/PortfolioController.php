<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->cannot('view.portfolio')) {
            return response()->redirectTo('errors/permission');
        }

        if($request->has('orderList')){
            foreach ($request->orderList as $item){
                $portfolio = Portfolio::find($item[0]);
                $portfolio->sort_order = $item[1];
                $portfolio->save();
            }
        }

        $data = Portfolio::with('portfolio_categories');

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_name'))) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('srch_name') . '%');
        }
        if(!empty($request->input('srch_portfolio_categories_id'))) {
            $data = $data->whereHas('portfolio_categories', function($q) use ($request) {
                $q->where('portfolio_categories_id', $request->input('srch_portfolio_categories_id'));
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
        elseif(!empty($request->input('srch_portfolio_categories_id_sort'))) {
            $data = $data->orderBy('portfolio_categories_id', $request->input('srch_portfolio_categories_id_sort'));
        }
        elseif(!empty($request->input('srch_language_sort'))) {
            $data = $data->orderBy('language', $request->input('srch_language_sort'));
        }
        else {
            $data = $data->orderBy('sort_order');
        }

        //## Paginate ##################################################################################################
        $paginate = 20;
        if(!empty($request->input('srch_paginate'))) {
            $paginate = $request->input('srch_paginate') == '*' ?  $data->count() : $request->input('srch_paginate');
        }

        $data = $data->paginate($paginate);

        $filter = $request->except('_token');
        $filter['srch_paginate'] = $paginate;

        $categories = PortfolioCategory::pluck('name', 'id');

        if ($request->ajax()) {
            return response()->json(View::make('admin.portfolio.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                    'categories' => $categories,
                ])->render());
        }

        return view('admin.portfolio.index', compact('data', 'filter', 'categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->cannot('create.portfolio')) {
            return response()->redirectTo('errors/permission');
        }

        $categories = PortfolioCategory::where('removable',1)->pluck('name', 'id');

        return view('admin.portfolio.create', compact('categories'));
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
            'portfolio_categories_id' => 'required',
            'text' => 'required',
        ];

        $messages = [
            'name.required' => trans('general.err_name_required'),
            'portfolio_categories_id.required' => trans('portfolio.err_category_portfolios_id_required'),
            'text.required' => trans('general.err_text_required')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new Portfolio();
            $model->portfolio_categories_id = $request->input('portfolio_categories_id');
            $model->name = $request->input('name');
            $model->default_image = $request->input('default_image');
            $model->thumbnail = $request->input('thumbnail');
            $model->model = $request->input('model');
            $model->standard_text = $request->input('standard_text');
            $model->standard_image = $request->input('standard_image');

            $model->usages_text = $request->input('usages_text');
            $model->usages_image = $request->input('usages_image');

            $model->mazaya_text = $request->input('mazaya_text');
            $model->mazaya_image = $request->input('mazaya_image');

            $vizhegi=collect();
            foreach ($request->input('vizhegi_value') as $key => $value){
                if($value!=null){
                    $vizhegi->put($request->input('vizhegi_key')[$key],$value);
                }
            }
            $json=$vizhegi->vizhegi = json_encode($vizhegi);
            $model->vizhegi = $json;

            $model->masraf_text = $request->input('masraf_text');
            $model->masraf_image = $request->input('masraf_image');

            $model->amadesazi_text = $request->input('amadesazi_text');
            $model->amadesazi_image = $request->input('amadesazi_image');

            $model->sakht_text = $request->input('sakht_text');
            $model->sakht_image = $request->input('sakht_image');

            $model->ejra_text = $request->input('ejra_text');
            $model->ejra_image = $request->input('ejra_image');

            $model->negahdari_text = $request->input('negahdari_text');
            $model->negahdari_image = $request->input('negahdari_image');

            $model->time_text = $request->input('time_text');
            $model->time_image = $request->input('time_image');

            $model->imeni_text = $request->input('imeni_text');
            $model->imeni_image = $request->input('imeni_image');

            $model->fanni_text = $request->input('fanni_text');
            $model->fanni_image = $request->input('fanni_image');

            $model->description = $request->get('text');
            $model->status = $request->input('status');
            $model->language = $request->input('language');
            if(!empty($request->input('title_seo')))
            $model->title_seo = $request->input('title_seo');
            if(!empty($request->input('keyword_seo')))
            $model->keyword_seo = $request->input('keyword_seo');
            if(!empty($request->input('description_seo')))
            $model->description_seo = $request->input('description_seo');
        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/portfolio')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/portfolio/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/portfolio/' . $model->id . '/edit')]);
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


        if(auth()->user()->cannot('edit.portfolio')) {
            return response()->redirectTo('errors/permission');
        }

        $data = Portfolio::find($id);
        $vizhegies=json_decode($data->vizhegi);
        $categories = PortfolioCategory::pluck('name', 'id');
        return view('admin.portfolio.edit', compact('data', 'categories','vizhegies'));
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
        if(auth()->user()->cannot('edit.portfolio')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
            'portfolio_categories_id' => 'required',
            'text' => 'required',
        ];

        $messages = [
            'name.required' => trans('general.err_name_required'),
            'portfolio_categories_id.required' => trans('portfolio.err_category_portfolios_id_required'),
            'text.required' => trans('general.err_text_required')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = Portfolio::find($id);
        $model->portfolio_categories_id = $request->input('portfolio_categories_id');
        $model->name = $request->input('name');
        $model->default_image = $request->input('default_image');
        $model->thumbnail = $request->input('thumbnail');
        $model->model = $request->input('model');
        $model->standard_text = $request->input('standard_text');
        $model->standard_image = $request->input('standard_image');

        $model->usages_text = $request->input('usages_text');
        $model->usages_image = $request->input('usages_image');

        $model->mazaya_text = $request->input('mazaya_text');
        $model->mazaya_image = $request->input('mazaya_image');

        $vizhegi=collect();
        foreach ($request->input('vizhegi_value') as $key => $value){
            if($value!=null){
                $vizhegi->put($request->input('vizhegi_key')[$key],$value);
            }
        }
        $json=$vizhegi->vizhegi = json_encode($vizhegi);
        $model->vizhegi = $json;

        $model->masraf_text = $request->input('masraf_text');
        $model->masraf_image = $request->input('masraf_image');

        $model->amadesazi_text = $request->input('amadesazi_text');
        $model->amadesazi_image = $request->input('amadesazi_image');

        $model->sakht_text = $request->input('sakht_text');
        $model->sakht_image = $request->input('sakht_image');

        $model->ejra_text = $request->input('ejra_text');
        $model->ejra_image = $request->input('ejra_image');

        $model->negahdari_text = $request->input('negahdari_text');
        $model->negahdari_image = $request->input('negahdari_image');

        $model->time_text = $request->input('time_text');
        $model->time_image = $request->input('time_image');

        $model->imeni_text = $request->input('imeni_text');
        $model->imeni_image = $request->input('imeni_image');

        $model->fanni_text = $request->input('fanni_text');
        $model->fanni_image = $request->input('fanni_image');

        $model->description = $request->get('text');
        $model->status = $request->input('status');
        $model->language = $request->input('language');
        if(!empty($request->input('title_seo')))
            $model->title_seo = $request->input('title_seo');
        if(!empty($request->input('keyword_seo')))
            $model->keyword_seo = $request->input('keyword_seo');
        if(!empty($request->input('description_seo')))
            $model->description_seo = $request->input('description_seo');
        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/portfolio')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/portfolio/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/portfolio/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.portfolio')) {
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
            Portfolio::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = Portfolio::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }

    public function delete_row(Request $request, $id)
    {
        $data = Portfolio::find($id);
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
