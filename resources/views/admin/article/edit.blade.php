@extends('layouts.admin')

@section('content')
    {{ Form::model($data, ['url' => url('panel/article/' . $data->id), 'class' => 'form-horizontal ajax-submit', 'role' => 'form']) }}
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h2>@lang('side_menu.articles')</h2>
            </div>
            <div class="col-md-9">
                <input type="hidden" name="save" id="saveMethod" value="">

                <a href="{{ url('panel/article') }}" class="btn btn-sm btn-back pull-left bg-blush">
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
                        <h2>@lang('article.edit')</h2>
                    </div>
                    <div class="body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"> <i class="zmdi zmdi-info"></i> @lang('general.detail') </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images"><i class="zmdi zmdi-image"></i> @lang('general.image') </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#videos"><i class="zmdi zmdi-image"></i> @lang('general.video') </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-settings"></i> @lang('general.setting') </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#seo"><i class="zmdi zmdi-settings"></i> @lang('general.seo_setting') </a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="details">
                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('article.category')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::select('article_categories_id', $categories, null, ['class' => 'form-control ms', 'placeholder' => '']) }}
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('article.title')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                                        @if ($errors->has('name'))
                                            <spnan class="cr-warning">{{ $errors->first('name') }}</spnan>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix engName">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('article.engtitle')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::text('engName', null, ['class' => 'form-control']) }}
                                        @if ($errors->has('engName'))
                                            <spnan class="cr-warning">{{ $errors->first('engName') }}</spnan>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('article.text')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::textarea('text', null, ['id' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                        @if ($errors->has('text'))
                                            <spnan class="cr-warning">{{ $errors->first('text') }}</spnan>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="images">
                                <a class="btn bg-green btn-clone" style="position: absolute; top:50px; left:20px" data-target="image">
                                    <i class="fa fa-plus-circle" style="font-size: 14px"></i>
                                    <span style="font-size: 14px">@lang('general.add_image')</span>
                                </a>

                                <div class="form-group textright" id="image">
                                <?php
                                    $exploded=explode(',',$data->image);
                                    $last=count($exploded);
                                    $nn=$last+1;
                                    $imageNumber='image-'."$nn";
                                ?>
                                    @if(!empty($data->image))
                                        @foreach(explode(',', $data->image) as $row)
                                            <div class="col-sm-12 col-md-6 fullbox clone-row" style="float: right;height: 60px;line-height: 60px;margin-top: 35px;position:relative;">

                                                <div class="previewCont">
                                                    <img src="{{ url($row) }}">
                                                </div>
                                                <a href="{{ url('panel/article/delete_row/' . $data->id) }}" class="text-danger delete-row delete-row1 col-md-1" data-image="{{ $row }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <div class="input-group dirleft">
                                                    <span class="input-group-addon" onclick="BrowseServer('image-{{  $loop->iteration }}');" style="cursor: pointer" id="span-image-{{ $loop->iteration }}">
                                                        <i class="fa fa-search"></i>
                                                    </span>
                                                    {{ Form::text('image[]', $row, ['class' => 'form-control textright', 'id' => 'image-' . $loop->iteration]) }}
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif
                                        <div class="col-sm-12 col-md-6 clone-row" style="float: right;height: 60px;line-height: 60px;margin-top: 40px;">
                                            <div class="previewCont empty22"></div>
                                            <a href="#" class="text-danger delete-row delete-row1 col-md-1">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="input-group dirleft">
                                            <span class="input-group-addon" onclick="BrowseServer('{{$imageNumber}}');" style="cursor: pointer" id="span-image-{{$last + 1}}">
                                                <i class="fa fa-search"></i>
                                            </span>
                                                {{ Form::text('image[]', null, ['class' => 'form-control textright newinnn', 'id' => "$imageNumber"]) }}
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    $('.newinnn').val('')
                                })
                            </script>
                            <div role="tabpanel" class="tab-pane" id="videos">
                                <a class="btn bg-green btn-clone" style="position: absolute; top:50px; left:20px" data-target="video|thumb">
                                    <i class="fa fa-plus-circle" style="font-size: 14px"></i>
                                    <span style="font-size: 14px">@lang('general.add_video')</span>
                                </a>
                                <div>
                                    <div class="col-sm-6 col-md-6" style="float: right">@lang('general.video_file')</div>
                                    <div class="col-sm-6 col-md-6" style="float: right">@lang('general.thumbnail')</div>
                                </div>

                                <div class="form-group textright" id="video">
                                    @if(!empty($data->video))
                                        @for($i = 0; $i < count(explode(',', $data->video)); $i++)
                                            <div class="col-sm-12 col-md-12 clone-row" style="float: right">
                                                <a href="{{ url('panel/article/delete_row/' . $data->id) }}" class="text-danger delete-row col-md-1"
                                                   data-video="{{ explode(',', $data->video)[$i] }}" data-thumb="{{ explode(',', $data->thumb)[$i] }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <div class="input-group dirleft">
                                                    <span class="input-group-addon" onclick="BrowseServer('video-{{  ($i + 1) }}');" style="cursor: pointer" id="span-video-{{  ($i + 1) }}">
                                                        <i class="fa fa-search"></i>
                                                    </span>
                                                    {{ Form::text('video[]', explode(',', $data->video)[$i], ['class' => 'form-control textright', 'id' => 'video-' . ($i + 1)]) }}

                                                    <span class="input-group-addon" onclick="BrowseServer('thumb-{{  ($i + 1) }}');" style="cursor: pointer; margin-right: 10px" id="span-thumb-{{  ($i + 1) }}">
                                                        <i class="fa fa-search"></i>
                                                    </span>
                                                    {{ Form::text('thumb[]', explode(',', $data->thumb)[0], ['class' => 'form-control textright', 'id' => 'thumb-' . ($i + 1)]) }}
                                                </div>
                                            </div>
                                        @endfor
                                    @else
                                        <div class="col-sm-12 col-md-12 clone-row" style="float: right">
                                            <a href="#" class="text-danger delete-row">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="input-group dirleft">
                                                <span class="input-group-addon" onclick="BrowseServer('video-1');" style="cursor: pointer" id="span-video-1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                                {{ Form::text('video[]', null, ['class' => 'form-control textright', 'id' => 'video-1']) }}

                                                <span class="input-group-addon" onclick="BrowseServer('thumb-1');" style="cursor: pointer; margin-right: 10px" id="span-thumb-1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                                {{ Form::text('thumb[]', null, ['class' => 'form-control textright', 'id' => 'thumb-1']) }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="settings">
                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('general.status')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 btnGroup">
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
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('article.show_view_more')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8 btnGroup">
                                        <label for="yes1" class="btn on @if($data->show_view_more == 1) bg-green @else btn-default @endif">
                                            <input type="radio" value="1" id="yes1" name="show_view_more" @if($data->show_view_more == 1) checked @endif>
                                            @lang('general.yes')
                                        </label>

                                        <label for="no1" class="btn off @if($data->show_view_more == 2) bg-blush @else btn-default @endif">
                                            <input type="radio" value="2" id="no1" name="show_view_more" @if($data->show_view_more == 2) checked @endif>
                                            @lang('general.no')
                                        </label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                        <span class="required">*</span>
                                        @lang('article.summary_character_count')
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        {{ Form::number('summary_character_count', null, ['class' => 'form-control']) }}
                                        @if ($errors->has('summary_character_count'))
                                            <spnan class="cr-warning">{{ $errors->first('summary_character_count') }}</spnan>
                                        @endif
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
                                            , null, ['class' => 'form-control ms', 'placeholder' => ''])
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
                                        {{ Form::text('keyword_seo', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                        @lang('general.seo_description')
                                    </label>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        {{ Form::text('description_seo', null, ['class' => 'form-control']) }}
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
        $('#articles, #article_list').addClass('active');
    </script>
@endsection