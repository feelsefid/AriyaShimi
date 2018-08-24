@extends('layouts.admin')

@section('content')
    {{ Form::model($data, ['url' => url('panel/menu/' . $data->id), 'class' => 'form-horizontal ajax-submit', 'role' => 'form']) }}
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h2>@lang('side_menu.menus')</h2>
            </div>
            <div class="col-md-9">
                <input type="hidden" name="save" id="saveMethod" value="">

                <a href="{{ url('panel/menu') }}" class="btn btn-sm btn-back pull-left bg-blush">
                    @lang('form.back')
                </a>

                <button class="btn btn-sm btn-save pull-left bg-blue" data-content="1" type="submit">
                    <span class="fa fa-check"></span>
                    @lang('form.save_close')
                </button>

                <button class="btn btn-sm btn-save pull-left bg-blue" data-content="2" type="submit">
                    <span class="fa fa-check"></span>
                    @lang('form.save_new')
                </button>

                <button class="btn btn-sm btn-save pull-left bg-green" data-content="3" type="submit">
                    <span class="fa fa-check"></span>
                    @lang('form.save')
                </button>
            </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>@lang('menu.edit')</h2>
                    </div>
                    <div class="body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"> <i class="zmdi zmdi-info"></i> @lang('general.detail') </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#type"><i class="zmdi zmdi-image"></i> @lang('menu.type') </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-settings"></i> @lang('general.setting') </a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="details">
                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('menu.title')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                                        @if ($errors->has('name'))
                                            <spnan class="cr-warning">{{ $errors->first('name') }}</spnan>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('menu.slug')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::text('slug', null, ['class' => 'form-control']) }}
                                        @if ($errors->has('slug'))
                                            <spnan class="cr-warning">{{ $errors->first('slug') }}</spnan>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('menu.category')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::select('menu_categories_id', $categories, null, ['class' => 'form-control ms', 'placeholder' => '']) }}
                                        @if ($errors->has('menu_categories_id'))
                                            <spnan class="cr-warning">{{ $errors->first('menu_categories_id') }}</spnan>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        @lang('menu.parent')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::select('parent_id', $parents, null, ['class' => 'form-control ms', 'placeholder' => '']) }}
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        @lang('menu.text')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::textarea('description', null, ['id' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="type">
                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('menu.type')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{
                                            Form::select('type',
                                                [
                                                    'link' => trans('menu.link'),
                                                    'article' => trans('menu.article'),
                                                    'category' => trans('article.category'),
                                                    'module' => trans('menu.module')
                                                ], null, ['class' => 'form-control ms', 'placeholder' => ''])
                                        }}
                                        @if ($errors->has('type'))
                                            <span class="cr-warning">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-sm-12 col-md-2 control-label">
                                        <span class="required">*</span>
                                        @lang('menu.information')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8" id="menu_level_1">
                                        @if($data->type == 'link')
                                            {{ Form::text('link', null, ['class' => 'form-control']) }}
                                        @elseif($data->type == 'article')
                                            {{ Form::select('menu_level_1', $menu_level_1, null, ['class' => 'form-control ms', 'placeholder', '', 'data-role' => 'article']) }}
                                        @elseif($data->type == 'module')
                                            {{ Form::select('link', $modules, null, ['class' => 'form-control ms', 'placeholder', '']) }}
                                        @elseif($data->type == 'category')
                                            {{ Form::select('link', $menu_level_1, null, ['class' => 'form-control ms', 'placeholder', '']) }}
                                        @endif
                                    </div>

                                    <label class="col-sm-12 col-md-2 control-label"></label>
                                    <div class="col-lg-10 col-md-10 col-sm-8" id="menu_level_2">
                                        @if(in_array($data->type, ['article']))
                                            {{ Form::select('link', $link, null, ['class' => 'form-control ms', 'placeholder', '', 'style' => 'margin-top: 15px']) }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="settings">
                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        @lang('general.status')
                                    </label>
                                    <div class="col-sm-12 col-md-10 btnGroup">
                                        <label for="active" class="btn on @if($data->status == 1) bg-green @else btn-default @endif">
                                            <input type="radio" value="1" id="active" name="status" @if($data->status == 1) checked @endif>
                                            @lang('form.active')
                                        </label>

                                        <label for="deactive" class="btn off @if($data->status == 2) bg-blush @else btn-default @endif">
                                            <input type="radio" value="2" id="deactive" name="status" @if($data->status == 2) checked @endif>
                                            @lang('form.deactive')
                                        </label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        @lang('general.language')
                                    </label>
                                    <div class="col-sm-12 col-md-10">
                                        {{ Form::select('language',
                                            [
                                                'fa' => 'Fa',
                                                'en' => 'En',
                                            ]
                                            , null, ['class' => 'form-control ms'])
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    <script>
        $('#menus, #menu_list').addClass('active');
    </script>

    @include('admin.menu.js')
@endsection