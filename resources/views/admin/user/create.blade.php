@extends('layouts.admin')

@section('content')
    {{ Form::open(['url' => url('panel/user'), 'class' => 'form-horizontal ajax-submit', 'role' => 'form']) }}
    {{ csrf_field() }}
    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h2>@lang('side_menu.users')</h2>
            </div>
            <div class="col-md-9">
                <input type="hidden" name="save" id="saveMethod" value="">

                <a href="{{ url('panel/user') }}" class="btn btn-sm btn-back pull-left bg-blush">
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
                        <h2>@lang('user.add')</h2>
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
                                        @lang('general.fullname')
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
                                        @lang('general.email')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::email('email', null, ['class' => 'form-control']) }}
                                        @if ($errors->has('name'))
                                            <spnan class="cr-warning">{{ $errors->first('email') }}</spnan>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('user.password')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::password('password', ['class' => 'form-control']) }}
                                        @if ($errors->has('password'))
                                            <spnan class="cr-warning">{{ $errors->first('password') }}</spnan>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('user.confirm_password')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                                        @if ($errors->has('password_confirmation'))
                                            <spnan class="cr-warning">{{ $errors->first('password_confirmation') }}</spnan>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('user.role')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::select('roles[]', $roles, null, ['class' => 'form-control ms chosen', 'multiple', 'data-placeholder' => trans('forms.chosen-select'), 'id' => 'role']) }}
                                        @if ($errors->has('roles'))
                                            <spnan class="cr-warning">{{ $errors->first('roles') }}</spnan>
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
                                        <label for="active" class="btn bg-green on">
                                            {{ Form::radio('status', '1', '1', ['id' => 'active']) }}
                                            @lang('form.active')
                                        </label>

                                        <label for="deactive" class="btn btn-default off">
                                            {{ Form::radio('status', '2', null, ['id' => 'deactive']) }}
                                            @lang('form.deactive')
                                        </label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        @lang('general.language')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::select('language',
                                            [
                                                'fa' => 'Fa',
                                                'en' => 'En',
                                            ]
                                            , app()->getLocale(), ['class' => 'form-control ms'])
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
        $('#users, #user_list').addClass('active');
    </script>
@endsection
