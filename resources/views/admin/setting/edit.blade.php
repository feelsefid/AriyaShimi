@extends('layouts.admin')

@section('content')
    {{ Form::model($data, ['url' => url('panel/setting/' . $data->id), 'class' => 'form-horizontal ajax-submit', 'role' => 'form', 'method' => 'PUT']) }}
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
                        <h2>@lang('setting.edit')</h2>
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
                                        @if(count((array)json_decode($data->phone)) > 0)
                                            <input type="hidden" name="row" value="{{ count((array)json_decode($data->phone)) }}">
                                            @foreach(json_decode($data->phone) as $key => $row)
                                                <div class="row clone-row">
                                                    <a href="{{ url('panel/setting/delete_row/' . $data->id) }}" data-target="{{ $key }}" data-field="phone" class="text-danger delete-row" style="width: 5% !important; line-height: 35px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="col-sm-12 col-md-6">
                                                        {{ Form::text('phone['. $key .'][title]', $row->title, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                    </div>
                                                    <div class="col-sm-12 col-md-6" style="width: 45% !important;">
                                                        {{ Form::text('phone['. $key .'][number]', $row->number, ['class' => 'form-control', 'placeholder' => trans('general.number')]) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row clone-row">
                                                <input type="hidden" name="row" value="0">
                                                <div class="col-sm-12 col-md-6">
                                                    {{ Form::text('phone[0][title]', null, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-6" style="width: 45% !important;">
                                                    {{ Form::text('phone[0][number]', null, ['class' => 'form-control', 'placeholder' => trans('general.number')]) }}
                                                </div>
                                            </div>
                                        @endif
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
                                        @if(count((array)json_decode($data->fax)) > 0)
                                            <input type="hidden" name="row" value="{{ count((array)json_decode($data->fax)) }}">
                                            @foreach(json_decode($data->fax) as $key => $row)
                                                <div class="row clone-row">
                                                    <a href="{{ url('panel/setting/delete_row/' . $data->id) }}" data-target="{{ $key }}" data-field="fax" class="text-danger delete-row" style="width: 5% !important; line-height: 35px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="col-sm-12 col-md-6">
                                                        {{ Form::text('fax['. $key .'][title]', $row->title, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                    </div>
                                                    <div class="col-sm-12 col-md-6" style="width: 45% !important;">
                                                        {{ Form::text('fax['. $key .'][number]', $row->number, ['class' => 'form-control', 'placeholder' => trans('general.number')]) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row clone-row">
                                                <input type="hidden" name="row" value="0">
                                                <div class="col-sm-12 col-md-6">
                                                    {{ Form::text('fax[0][title]', null, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-6" style="width: 45% !important;">
                                                    {{ Form::text('fax[0][number]', null, ['class' => 'form-control', 'placeholder' => trans('general.number')]) }}
                                                </div>
                                            </div>
                                        @endif
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
                                        @if(count((array)json_decode($data->address)) > 0)
                                            <input type="hidden" name="row" value="{{ count((array)json_decode($data->address)) }}">
                                            @foreach(json_decode($data->address) as $key => $row)
                                                <div class="row clone-row">
                                                    <a href="{{ url('panel/setting/delete_row/' . $data->id) }}" data-target="{{ $key }}" data-field="address" class="text-danger delete-row" style="width: 5% !important; line-height: 35px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="col-sm-12 col-md-3" style="width: 36% !important;">
                                                        {{ Form::text('address['. $key .'][title]', $row->title, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                    </div>
                                                    <div class="col-sm-12 col-md-3">
                                                        {{ Form::text('address['. $key .'][address]', $row->address, ['class' => 'form-control', 'placeholder' => trans('general.address')]) }}
                                                    </div>
                                                    <div class="col-sm-12 col-md-3">
                                                        {{ Form::text('address['. $key .'][latitude]', @$row->latitude, ['class' => 'form-control', 'placeholder' => trans('general.latitude')]) }}
                                                    </div>
                                                    <div class="col-sm-12 col-md-3" style="width: 36% !important;">
                                                        {{ Form::text('address['. $key .'][longitude]', @$row->longitude, ['class' => 'form-control', 'placeholder' => trans('general.longitude')]) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row clone-row">
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
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        <a class="btn btn-link setting-btn-clone" data-target="#email">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        @lang('general.emails')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8" id="email">
                                        @if(count((array)json_decode($data->email)) > 0)
                                            <input type="hidden" name="row" value="{{ count((array)json_decode($data->email)) }}">
                                            @foreach(json_decode($data->email) as $key => $row)
                                                <div class="row clone-row">
                                                    <a href="{{ url('panel/setting/delete_row/' . $data->id) }}" data-target="{{ $key }}" data-field="email" class="text-danger delete-row" style="width: 5% !important; line-height: 35px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="col-sm-12 col-md-6">
                                                        {{ Form::text('email['. $key .'][title]', $row->title, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                    </div>
                                                    <div class="col-sm-12 col-md-6" style="width: 45% !important;">
                                                        {{ Form::text('email['. $key .'][email]', $row->email, ['class' => 'form-control', 'placeholder' => trans('general.email')]) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row clone-row">
                                                <input type="hidden" name="row" value="0">
                                                <div class="col-sm-12 col-md-6" style="width: 36% !important;">
                                                    {{ Form::text('email[0][title]', null, ['class' => 'form-control', 'placeholder' => trans('general.title')]) }}
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    {{ Form::text('email[0][email]', null, ['class' => 'form-control', 'placeholder' => trans('general.email')]) }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('setting.underconstrution')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 btnGroup">
                                        <label for="active" class="btn on @if($data->under_construction == 1) bg-green @else btn-default @endif">
                                            <input type="radio" value="1" id="active" name="under_construction" @if($data->under_construction == 1) checked @endif>
                                            @lang('general.yes')
                                        </label>

                                        <label for="deactive" class="btn off @if($data->under_construction == 2) bg-blush @else btn-default @endif">
                                            <input type="radio" value="2" id="deactive" name="under_construction" @if($data->under_construction == 2) checked @endif>
                                            @lang('general.no')
                                        </label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        {{--@lang('setting.underconstrution_text')--}}
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        {{ Form::textarea('under_construction_text', null, ['id' => 'ckeditor', 'class' => 'form-control']) }}
                                        @if ($errors->has('under_construction_text'))
                                            <spnan class="cr-warning">{{ $errors->first('under_construction_text') }}</spnan>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="images">
                                <div class="row clearfix" id="image1">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('setting.logo')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 clone-row">
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
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('setting.logo2')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 clone-row">
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
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('setting.favicon')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 clone-row">
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
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('general.status')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 btnGroup">
                                        <label for="active1" class="btn on @if($data->status == 1) bg-green @else btn-default @endif">
                                            <input type="radio" value="1" id="active1" name="status" @if($data->status == 1) checked @endif>
                                            @lang('form.active')
                                        </label>

                                        <label for="deactive2" class="btn off @if($data->status == 2) bg-blush @else btn-default @endif">
                                            <input type="radio" value="2" id="deactive2" name="status" @if($data->status == 2) checked @endif>
                                            @lang('form.deactive')
                                        </label>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('general.language')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
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

                            <div role="tabpanel" class="tab-pane" id="seo">
                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('general.seo_title')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        {{ Form::text('title_seo', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('general.seo_keywords')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        {{ Form::textarea('keyword_seo', null, ['class' => 'form-control', 'rows' => 3]) }}
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('general.seo_description')
                                    </label>
                                    <div class="col-lg-9 col-md-9">
                                        {{ Form::textarea('description_seo', null, ['class' => 'form-control', 'rows' => 3]) }}
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="social">
                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('social.facebook')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        @if ($errors->has('facebook'))
                                            <span class="cr-warning">{{ $errors->first('facebook') }}</span>
                                        @endif
                                        {{ Form::text('socials[facebook]', @json_decode($data->socials)->facebook, ['class'=> 'form-control']) }}
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('social.telegram')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        @if ($errors->has('telegram'))
                                            <span class="cr-warning">{{ $errors->first('telegram') }}</span>
                                        @endif
                                        {{ Form::text('socials[telegram]', @json_decode($data->socials)->telegram, ['class'=> 'form-control']) }}
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('social.twitter')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        @if ($errors->has('twitter'))
                                            <span class="cr-warning">{{ $errors->first('twitter') }}</span>
                                        @endif
                                        {{ Form::text('socials[twitter]', @json_decode($data->socials)->twitter, ['class'=> 'form-control']) }}
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        @lang('social.instagram')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        @if ($errors->has('instagram'))
                                            <span class="cr-warning">{{ $errors->first('instagram') }}</span>
                                        @endif
                                        {{ Form::text('socials[instagram]', @json_decode($data->socials)->instagram, ['class'=> 'form-control']) }}
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