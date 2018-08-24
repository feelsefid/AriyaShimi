@extends('layouts.admin')

@section('content')
    {{ Form::model($data, ['url' => url('panel/role/' . $data->id), 'class' => 'form-horizontal ajax-submit', 'role' => 'form']) }}
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h2>@lang('side_menu.users')</h2>
            </div>
            <div class="col-md-9">
                <input type="hidden" name="save" id="saveMethod" value="">

                <a href="{{ url('panel/role') }}" class="btn btn-sm btn-back pull-left bg-blush">
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

    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>@lang('user.edit_role')</h2>
                    </div>
                    <div class="body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"> <i class="zmdi zmdi-info"></i> @lang('general.detail') </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-settings"></i> @lang('general.setting') </a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="details">
                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('user.role')
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
                                        @lang('user.role_slug')
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
                                        @lang('user.role_description')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'ckeditor']) }}
                                        @if ($errors->has('description'))
                                            <spnan class="cr-warning">{{ $errors->first('description') }}</spnan>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="settings">
                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        @lang('general.status')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8 btnGroup">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}

    <script>
        $('#users, #role_list').addClass('active');
    </script>
@endsection