@extends('layouts.admin')

@section('content')
    {{ Form::model($data, ['url' => url('panel/team/' . $data->id), 'class' => 'form-horizontal ajax-submit', 'role' => 'form']) }}
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="block-header">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h2>@lang('side_menu.teams')</h2>
                </div>
                <div class="col-md-9">
                    <input type="hidden" name="save" id="saveMethod" value="">

                    <a href="{{ url('panel/team') }}" class="btn btn-sm btn-back pull-left bg-blush">
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
                            <h2>@lang('team.edit')</h2>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"> <i class="zmdi zmdi-info"></i> @lang('general.detail') </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images"><i class="zmdi zmdi-image"></i> @lang('general.image') </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-settings"></i> @lang('general.setting') </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#socials"><i class="zmdi zmdi-settings"></i> @lang('general.socials') </a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="details">
                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            <span class="required">*</span>
                                            @lang('team.title')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                                            @if ($errors->has('name'))
                                                <span class="cr-warning">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            <span class="required">*</span>
                                            @lang('team.position')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            {{ Form::text('position', null, ['class' => 'form-control']) }}
                                            @if ($errors->has('position'))
                                                <span class="cr-warning">{{ $errors->first('position') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            <span class="required">*</span>
                                            @lang('team.description')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            {{ Form::textarea('description', null, ['id' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                            @if ($errors->has('description'))
                                                <span class="cr-warning">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="images">
                                    <div role="tabpanel" class="tab-pane" id="image">
                                        <div class="row clearfix">
                                            <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                @lang('general.image')
                                            </label>
                                            <div class="col-lg-10 col-md-10 col-sm-8 clone-row">
                                                <div class="input-group dirleft">
                                                    <span class="input-group-addon info cr-click" onclick="BrowseServer('image-1');"><i class="fa fa-search"></i></span>
                                                    {{ Form::text('image', null, ['class' => 'form-control textright', 'id' => 'image-1']) }}
                                                </div>
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
                                        <div class="col-lg-10 col-md-10 col-sm-8">
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

                                <div role="tabpanel" class="tab-pane" id="socials">
                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            @lang('social.facebook')
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            @if ($errors->has('facebook'))
                                                <span class="cr-warning">{{ $errors->first('facebook') }}</span>
                                            @endif
                                            {{ Form::text('facebook', null, ['class'=> 'form-control']) }}
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
                                            {{ Form::text('telegram', null, ['class'=> 'form-control']) }}
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
                                            {{ Form::text('twitter', null, ['class'=> 'form-control']) }}
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
                                            {{ Form::text('instagram', null, ['class'=> 'form-control']) }}
                                        </div>
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
        $('#modules, #team').addClass('active');
    </script>
@endsection