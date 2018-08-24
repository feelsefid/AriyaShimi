<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
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

        $data = Article::with('article_categories')->orderBy('id','desc');

        //## Filter By Column ##########################################################################################
        if(!empty($request->input('srch_name'))) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('srch_name') . '%');
        }
        if(!empty($request->input('srch_article_categories_id'))) {
            $data = $data->whereHas('article_categories', function($q) use ($request) {
                $q->where('article_categories_id', $request->input('srch_article_categories_id'));
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
        elseif(!empty($request->input('srch_article_categories_id_sort'))) {
            $data = $data->orderBy('article_categories_id', $request->input('srch_article_categories_id_sort'));
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
            return response()->json(View::make('admin.article.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                    'categories' => $categories,
                ])->render());
        }

        return view('admin.article.index', compact('data', 'filter', 'categories'));
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

        $categories = ArticleCategory::where('removable',1)->pluck('name', 'id');

        return view('admin.article.create', compact('categories'));
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
            'article_categories_id' => 'required',
            'text' => 'required',
        ];

        $messages = [
            'name.required' => trans('general.err_name_required'),
            'summary_character_count.required' => trans('general.err_summary_character_count_required'),
            'article_categories_id.required' => trans('article.err_category_articles_id_required'),
            'text.required' => trans('general.err_text_required')
        ];


        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new Article();

        $model->article_categories_id = $request->input('article_categories_id');
        $model->name = $request->input('name');
        $model->summary_character_count = $request->input('summary_character_count');
        $model->text = $request->get('text');
        $model->removable=1;
        $model->show_view_more = $request->input('show_view_more');

        if(count($request->input('image')) > 0) {
            $images = implode(',', array_filter($request->input('image')));
            $model->image = $images;
        }

        if(count($request->input('thumb')) > 0) {
            $thumb = implode(',', array_filter($request->input('thumb')));
            $model->thumb = $thumb;
        }

        if(count($request->input('video')) > 0) {
            $video = implode(',', array_filter($request->input('video')));
            $model->video = $video;
        }

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
                    return response()->json(['redirectPath' => url('panel/article')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/article/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/article/' . $model->id . '/edit')]);
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


        if(auth()->user()->cannot('edit.article')) {
            return response()->redirectTo('errors/permission');
        }

        $data = Article::find($id);
        $categories = ArticleCategory::pluck('name', 'id');
        return view('admin.article.edit', compact('data', 'categories'));
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
            'article_categories_id' => 'required',
            'text' => 'required',
        ];

        $messages = [
            'name.required' => trans('general.err_name_required'),
            'summary_character_count.required' => trans('general.err_summary_character_count_required'),
            'article_categories_id.required' => trans('article.err_category_articles_id_required'),
            'text.required' => trans('general.err_text_required')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = Article::find($id);

        $model->article_categories_id = $request->input('article_categories_id');
        $model->name = $request->input('name');
        $model->summary_character_count = $request->input('summary_character_count');
        $model->text = $request->get('text');
        $model->show_view_more = $request->input('show_view_more');

        if(count($request->input('image')) > 0) {
            $images = implode(',', array_filter($request->input('image')));
            $model->image = $images;
        }

        if(count($request->input('thumb')) > 0) {
            $thumb = implode(',', array_filter($request->input('thumb')));
            $model->thumb = $thumb;
        }

        if(count($request->input('video')) > 0) {
            $video = implode(',', array_filter($request->input('video')));
            $model->video = $video;
        }

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
                    return response()->json(['redirectPath' => url('panel/article')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/article/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/article/' . $model->id . '/edit')]);
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
            Article::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = Article::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }

    public function delete_row(Request $request, $id)
    {
        $data = Article::find($id);
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
