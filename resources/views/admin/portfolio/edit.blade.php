@extends('layouts.admin')

@section('content')
    {{ Form::model($data,['url' => url('panel/portfolio/'.$data->id), 'class' => 'form-horizontal ajax-submit', 'role' => 'form', 'id' => 'form']) }}
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="block-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h2>@lang('side_menu.portfolios')</h2>
                </div>
                <div class="col-md-9">
                 <input type="hidden" name="save" id="saveMethod" value="">

                    <a href="{{ url('panel/portfolio') }}" class="btn btn-sm btn-back pull-left bg-blush">
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

                    <button class="btn btn-sm btn-save pull-left bg-green" data-content="3" type="submit" style="width:160px"
                        onclick="changeFormStatus('#form')">
                        <span class="fa fa-check"></span>
                        @lang('form.copy_save')
                    </button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix theVipPortfolio">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>@lang('portfolio.add')</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-2">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"><i class="zmdi zmdi-view-toc"></i> @lang('general.detail') </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#standard"><i class="zmdi zmdi-view-toc"></i> استاندارد </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usages"><i class="zmdi zmdi-view-toc"></i> موارد کاربرد </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mazaya"><i class="zmdi zmdi-view-toc"></i> مزایای استفاده </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#vizhegi"><i class="zmdi zmdi-view-toc"></i>ویژگی ها </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#masraf"><i class="zmdi zmdi-view-toc"></i>میزان مصرف </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#amadesazi"><i class="zmdi zmdi-view-toc"></i>آماده سازی طرح </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sakht"><i class="zmdi zmdi-view-toc"></i>طریقه ساخت </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ejra"><i class="zmdi zmdi-view-toc"></i> طریقه اجرا</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#negahdari"><i class="zmdi zmdi-view-toc"></i> شرایط نگهداری </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#time"><i class="zmdi zmdi-view-toc"></i> مدت نگهداری </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#imeni"><i class="zmdi zmdi-view-toc"></i> نکات ایمنی
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fanni"><i class="zmdi zmdi-view-toc"></i> خدمات فنی </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-settings"></i> @lang('general.setting') </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#seo"><i class="zmdi zmdi-settings"></i> @lang('general.seo_setting') </a></li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="tab-content">
                                        <!-- tab joziat -->
                                        <div role="tabpanel" class="tab-pane in active" id="details">
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.title')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::text('name', $data->name, ['class' => 'form-control']) }}
                                                    @if ($errors->has('name'))
                                                        <spnan class="cr-warning">{{ $errors->first('name') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- category -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.category')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::select('portfolio_categories_id', $categories, null, ['class' => 'form-control ms', 'placeholder' => '']) }}
                                                </div>
                                            </div>

                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.default_image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->default_image) }}" alt="" id="runtime_defaultImage">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('defaultImage');" style="cursor: pointer" id="span-defaultImage">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('default_image', $data->default_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'defaultImage','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('text'))
                                                        <spnan class="cr-warning">{{ $errors->first('text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('text',$data->description, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('text'))
                                                        <spnan class="cr-warning">{{ $errors->first('text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- tab standard -->
                                        <div role="tabpanel" class="tab-pane" id="standard">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->standard_image) }}" alt="" id="runtime_standard_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('standard_image');" style="cursor: pointer" id="span-standard">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('standard_image', $data->standard_image, ['class' => 'form-control textright', 'id' => 'standard_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('standard_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('standard_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('standard_text', $data->standard_text , ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('standard_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('standard_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- tab usages -->
                                        <div role="tabpanel" class="tab-pane" id="usages">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->usages_image) }}" alt="" id="runtime_usage_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('usages_image');" style="cursor: pointer" id="span-usages">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('usages_image', $data->usages_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'usages_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('usages_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('usages_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('usages_text', $data->usages_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('usages_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('usages_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab mazaya -->
                                        <div role="tabpanel" class="tab-pane" id="mazaya">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->mazaya_image) }}" alt="" id="runtime_mazaya_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('mazaya_image');" style="cursor: pointer" id="span-mazaya">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('mazaya_image', $data->mazaya_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'mazaya_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('mazaya_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('mazaya_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('mazaya_text', $data->mazaya_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('mazaya_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('mazaya_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab vizhegi -->
                                        <div role="tabpanel" class="tab-pane" id="vizhegi">
                                            <a class="btn bg-green addVizhegi" style="position: absolute;top:-45px;left:20px">
                                                <i class="fa fa-plus-circle" style="font-size: 14px"></i>
                                                <span style="font-size: 14px">افزودن</span>
                                            </a>
                                            @foreach($vizhegies as $key => $value)
                                                <div class="vizhegiPack ">
                                                    <div class="row clearfix" style="border-top: 1px solid #ccc;">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">ویژگی</label>
                                                                <input type="text" value="{{$key}}" class="form-control" placeholder="" name="vizhegi_key[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">توضیحات</label>
                                                                <input type="text" value="{{$value}}" class="form-control" placeholder="" name="vizhegi_value[]">
                                                            </div>
                                                        </div>
                                                        <a href="#" class="text-danger delete-row">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- tab masraf -->
                                        <div role="tabpanel" class="tab-pane" id="masraf">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->masraf_image) }}" alt="" id="runtime_masaref_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('masraf_image');" style="cursor: pointer" id="span-masraf">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('masraf_image', $data->masraf_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'masraf_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('masraf_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('masraf_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('masraf_text', $data->masraf_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('masraf_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('masraf_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab amadesazi -->
                                        <div role="tabpanel" class="tab-pane" id="amadesazi">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->amadesazi_image) }}" alt="" id="runtime_amadesazi_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('amadesazi_image');" style="cursor: pointer" id="span-amadesazi">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('amadesazi_image', $data->amadesazi_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'amadesazi_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('amadesazi_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('amadesazi_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('amadesazi_text', $data->amadesazi_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('amadesazi_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('amadesazi_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab sakht -->
                                        <div role="tabpanel" class="tab-pane" id="sakht">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->sakht_image) }}" alt="" id="runtime_sakht_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('sakht_image');" style="cursor: pointer" id="span-sakht">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('sakht_image', $data->sakht_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'sakht_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('sakht_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('sakht_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('sakht_text', $data->sakht_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('sakht_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('sakht_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab ejra -->
                                        <div role="tabpanel" class="tab-pane" id="ejra">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->ejra_image) }}" alt="" id="runtime_ejra_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('ejra_image');" style="cursor: pointer" id="span-ejra">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('ejra_image', $data->ejra_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'ejra_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('ejra_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('ejra_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('ejra_text', $data->ejra_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('ejra_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('ejra_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab negahdari -->
                                        <div role="tabpanel" class="tab-pane" id="negahdari">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->negahdari_image) }}" alt="" id="runtime_standard_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('negahdari_image');" style="cursor: pointer" id="span-negahdari">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('negahdari_image', $data->negahdari_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'negahdari_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('negahdari_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('negahdari_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('negahdari_text', $data->negahdari_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('negahdari_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('negahdari_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab time -->
                                        <div role="tabpanel" class="tab-pane" id="time">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->time_image) }}" alt="" id="runtime_time_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('time_image');" style="cursor: pointer" id="span-time">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('time_image', $data->time_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'time_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('time_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('time_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('time_text', $data->time_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('time_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('time_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab imeni -->
                                        <div role="tabpanel" class="tab-pane" id="imeni">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->imeni_image) }}" alt="" id="runtime_imeni_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('imeni_image');" style="cursor: pointer" id="span-imeni">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('imeni_image', $data->imeni_image, ['class' => 'form-control textright pfDefaultImage', 'id' => 'imeni_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('imeni_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('imeni_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('imeni_text', $data->imeni_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('imeni_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('imeni_text') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab fanni -->
                                        <div role="tabpanel" class="tab-pane" id="fanni">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.image')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="{{ url($data->fanni_image) }}" alt="" id="runtime_fanni_image">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('fanni_image');" style="cursor: pointer" id="span-fanni">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        {{ Form::text('fanni_image', $data->fanni_text, ['class' => 'form-control textright pfDefaultImage', 'id' => 'fanni_image','style' => 'height:82px;']) }}
                                                    </div>
                                                    @if ($errors->has('fanni_image'))
                                                        <spnan class="cr-warning">{{ $errors->first('fanni_image') }}</spnan>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.text')
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    {{ Form::textarea('fanni_text', $data->fanni_text, ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10]) }}
                                                    @if ($errors->has('fanni_text'))
                                                        <spnan class="cr-warning">{{ $errors->first('fanni_text') }}</spnan>
                                                    @endif
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
                                                <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.show_view_more')
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-8 btnGroup">
                                                    <label for="yes1" class="btn btn-default on">
                                                        {{ Form::radio('show_view_more', '1', null, ['id' => 'yes1']) }}
                                                        @lang('general.yes')
                                                    </label>

                                                    <label for="no1" class="btn bg-blush off">
                                                        {{ Form::radio('show_view_more', '2', true, ['id' => 'no1']) }}
                                                        @lang('general.no')
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row clearfix">
                                                <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    @lang('portfolio.summary_character_count')
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
                                                        , app()->getLocale(), ['class' => 'form-control ms', 'placeholder' => ''])
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
            </div>
        </div>
    {{ Form::close() }}
    <script>
        $('#portfolios, #portfolio_list').addClass('active');

        function changeFormStatus(form) {
            $(form).attr('action', 'panel/portfolio');
            $('input[name="_method"]').remove();
        }
    </script>

@endsection
