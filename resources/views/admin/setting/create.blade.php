@extends('layouts.admin')

@section('content')
    {{ Form::open(['url' => url('panel/setting'), 'class' => 'form-horizontal ajax-submit', 'role' => 'form']) }}
        {{ csrf_field() }}
        <div class="block-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h2>@lang('side_menu.system_settings')</h2>
                </div>
                <div class="col-md-9">
                    <input type="hidden" name="save" id="saveMethod" value="">

                    <a href="{{ url('panel/setting') }}" class="btn btn-sm btn-back pull-left bg-blush">
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
                            <h2>@lang('setting.add')</h2>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"> <i class="zmdi zmdi-info"></i> @lang('general.detail') </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images"> <i class="zmdi zmdi-info"></i> @lang('general.image') </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#seo"> <i class="zmdi zmdi-info"></i> @lang('general.seo_setting') </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#social"> <i class="zmdi zmdi-info"></i> @lang('general.socials') </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-settings"></i> @lang('general.setting') </a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="details">
                                    <div class="row clearfix">
                                        <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                            <span class="required">*</span>
                                            @lang('general.title')
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                                            @if ($errors->has('title'))
                                                <spnan class="cr-warning">{{ $errors->first('title') }}</spnan>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                            <a class="btn btn-link setting-btn-clone" data-target="#phone">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            @lang('general.phones')
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-8" id="phone">
                                            <div class="row clone-row">
                                                <a href="#" class="text-danger delete-row col-md-1">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <input type="hidden" name="row" value="0">
                                                <div class="col-sm-12 col-md-6">
                                                    {{ Form::text('phone[0][title]', null, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-6" style="width: 45% !important;">
                                                    {{ Form::text('phone[0][number]', null, ['class' => 'form-control', 'placeholder' => trans('general.number')]) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                            <a class="btn btn-link setting-btn-clone" data-target="#fax">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            @lang('general.faxes')
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-8" id="fax">
                                            <div class="row clone-row">
                                                <a href="#" class="text-danger delete-row col-md-1">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <input type="hidden" name="row" value="0">
                                                <div class="col-sm-12 col-md-6">
                                                    {{ Form::text('fax[0][title]', null, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-6" style="width: 45% !important;">
                                                    {{ Form::text('fax[0][number]', null, ['class' => 'form-control', 'placeholder' => trans('general.number')]) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                            <a class="btn btn-link setting-btn-clone" data-target="#address">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            @lang('general.addresses')
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-8" id="address">
                                            <div class="row clone-row">
                                                <a href="#" class="text-danger delete-row col-md-1">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <input type="hidden" name="row" value="0">
                                                <div class="col-sm-12 col-md-3" style="width: 36% !important;">
                                                    {{ Form::text('address[0][title]', null, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    {{ Form::text('address[0][address]', null, ['class' => 'form-control', 'placeholder' => trans('general.address')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    {{ Form::text('address[0][latitude]', null, ['class' => 'form-control', 'placeholder' => trans('general.latitude')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-3" style="width: 36% !important;">
                                                    {{ Form::text('address[0][longitude]', null, ['class' => 'form-control', 'placeholder' => trans('general.longitude')]) }}
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="dotted">
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                            <a class="btn btn-link setting-btn-clone" data-target="#email">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            @lang('general.emails')
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-8" id="email">
                                            <div class="row clone-row">
                                                <a href="#" class="text-danger delete-row col-md-1">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <input type="hidden" name="row" value="0">
                                                <div class="col-sm-12 col-md-6">
                                                    {{ Form::text('email[0][email]', null, ['class' => 'form-control', 'placeholder' => trans('general.email')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-6" style="width: 36% !important;">
                                                    {{ Form::text('email[0][title]', null, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                            @lang('setting.underconstrution')
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-8 btnGroup">
                                            <label for="active" class="btn btn-default on">
                                                {{ Form::radio('under_construction', '1', null, ['id' => 'active']) }}
                                                @lang('general.yes')
                                            </label>

                                            <label for="deactive" class="btn bg-blush off">
                                                {{ Form::radio('under_construction', '2', 1, ['id' => 'deactive']) }}
                                                @lang('general.no')
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                            @lang('setting.underconstrution_text')
                                        </label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            {{ Form::textarea('under_construction_text', ' ', ['id' => 'ckeditor', 'class' => 'form-control']) }}
                                            @if ($errors->has('under_construction_text'))
                                                <spnan class="cr-warning">{{ $errors->first('under_construction_text') }}</spnan>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="images">
                                    <div class="row clearfix" id="image1">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('setting.logo')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8 clone-row">
                                            <a href="#" class="text-danger delete-row col-md-1">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="input-group dirleft">
                                                <span class="input-group-addon info cr-click" onclick="BrowseServer('image-1');"><i class="fa fa-search"></i></span>
                                                {{ Form::text('logo', null, ['class' => 'form-control textright', 'id' => 'image-1']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix" id="logo2">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('setting.logo2')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8 clone-row">
                                            <a href="#" class="text-danger delete-row col-md-1">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="input-group dirleft">
                                                <span class="input-group-addon info cr-click" onclick="BrowseServer('image-3');"><i class="fa fa-search"></i></span>
                                                {{ Form::text('logo2', null, ['class' => 'form-control textright', 'id' => 'image-3']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix" id="image2">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('setting.favicon')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8 clone-row">
                                            <a href="#" class="text-danger delete-row col-md-1">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="input-group dirleft">
                                                <span class="input-group-addon info cr-click" onclick="BrowseServer('image-2');"><i class="fa fa-search"></i></span>
                                                {{ Form::text('favicon', null, ['class' => 'form-control textright', 'id' => 'image-2']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('general.status')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8 btnGroup">
                                            <label for="active1" class="btn bg-green on">
                                                {{ Form::radio('status', '1', '1', ['id' => 'active1']) }}
                                                @lang('form.active')
                                            </label>

                                            <label for="deactive1" class="btn btn-default off">
                                                {{ Form::radio('status', '2', null, ['id' => 'deactive1']) }}
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

                                <div role="tabpanel" class="tab-pane" id="seo">
                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('general.seo_title')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            {{ Form::text('title_seo', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('general.seo_keywords')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            {{ Form::textarea('keyword_seo', null, ['class' => 'form-control', 'rows' => 3]) }}
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('general.seo_description')
                                        </label>
                                        <div class="col-sm-12 col-md-10">
                                            {{ Form::textarea('description_seo', null, ['class' => 'form-control', 'rows' => 3]) }}
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="social">
                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('social.facebook')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            @if ($errors->has('facebook'))
                                                <span class="cr-warning">{{ $errors->first('facebook') }}</span>
                                            @endif
                                            {{ Form::text('socials[facebook]', null, ['class'=> 'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('social.telegram')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            @if ($errors->has('telegram'))
                                                <span class="cr-warning">{{ $errors->first('telegram') }}</span>
                                            @endif
                                            {{ Form::text('socials[telegram]', null, ['class'=> 'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('social.twitter')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            @if ($errors->has('twitter'))
                                                <span class="cr-warning">{{ $errors->first('twitter') }}</span>
                                            @endif
                                            {{ Form::text('socials[twitter]', null, ['class'=> 'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('social.instagram')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            @if ($errors->has('instagram'))
                                                <span class="cr-warning">{{ $errors->first('instagram') }}</span>
                                            @endif
                                            {{ Form::text('socials[instagram]', null, ['class'=> 'form-control']) }}
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
        $('#setting').addClass('active');
    </script>
@endsection