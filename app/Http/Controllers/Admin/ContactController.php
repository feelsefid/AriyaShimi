<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
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
        if(auth()->user()->cannot('view.contact')) {
            return response()->redirectTo('errors/permission');
        }

        $data = new Contact();

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

        if ($request->ajax()) {
            return response()->json(View::make('admin.contact.grid',
                [
                    'data' => $data,
                    'filter' => $filter,
                ])->render());
        }

        return view('admin.contact.index', compact('data', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->cannot('create.contact')) {
            return response()->redirectTo('errors/permission');
        }

        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->cannot('create.contact')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];

        $messages = [
            'name.required' => trans('contact.err_name_required'),
            'email.required' => trans('contact.err_email_required'),
            'email.email' => trans('contact.err_email')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = new Contact();

        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->status = $request->input('status');
        $model->language = $request->input('language');

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/contact')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/contact/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/contact/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('edit.contact')) {
            return response()->redirectTo('errors/permission');
        }

        $data = Contact::find($id);
        return view('admin.contact.edit', compact('data'));
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
        if(auth()->user()->cannot('edit.contact')) {
            return response()->redirectTo('errors/permission');
        }

        $inputs = $request->except('_token');

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];

        $messages = [
            'name.required' => trans('contact.err_name_required'),
            'email.required' => trans('contact.err_email_required'),
            'email.email' => trans('contact.err_email')
        ];

        $validator = Validator::make($inputs, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(['hasError' => true, 'errorMessage' => $validator->errors()]);
            }

            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $model = Contact::find($id);

        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->status = $request->input('status');
        $model->language = $request->input('language');

        $model->save();

        if($request->ajax()) {
            switch ($request->input('save')) {
                case 1 :
                    return response()->json(['redirectPath' => url('panel/contact')]);
                case 2 :
                    return response()->json(['redirectPath' => url('panel/contact/create')]);
                case 3:
                    return response()->json(['redirectPath' => url('panel/contact/' . $model->id . '/edit')]);
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
        if(auth()->user()->cannot('delete.contact')) {
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
            contact::destroy($id);
        }

        return response()->json(['deleted' => $canDelete]);
    }

    public function changeStatus(Request $request, $id) {
        foreach (explode(',', $id) as $row) {
            $model = Contact::find($row);
            $model->status = $request->get('status') == 1 ? 1 : 2;
            $model->save();
        }

        return response()->json(true);
    }
}
