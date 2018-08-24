<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['url' => url('panel/portfolio'), 'class' => 'form-horizontal ajax-submit', 'role' => 'form'])); ?>

        <?php echo e(csrf_field()); ?>

        <div class="block-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h2><?php echo app('translator')->getFromJson('side_menu.portfolios'); ?></h2>
                </div>
                <div class="col-md-9">
                 <input type="hidden" name="save" id="saveMethod" value="">

                    <a href="<?php echo e(url('panel/portfolio')); ?>" class="btn btn-sm btn-back pull-left bg-blush">
                        <?php echo app('translator')->getFromJson('form.back'); ?>
                    </a>

                    <button class="btn btn-sm btn-save pull-left bg-blue" data-content="1" type="submit">
                        <span class="fa fa-check"></span>
                        <?php echo app('translator')->getFromJson('form.save_close'); ?>
                    </button>

                    <button class="btn btn-sm btn-save pull-left bg-blue" data-content="2" type="submit">
                        <span class="fa fa-check"></span>
                        <?php echo app('translator')->getFromJson('form.save_new'); ?>
                    </button>

                    <button class="btn btn-sm btn-save pull-left bg-green" data-content="3" type="submit">
                        <span class="fa fa-check"></span>
                        <?php echo app('translator')->getFromJson('form.save'); ?>
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
                            <h2><?php echo app('translator')->getFromJson('portfolio.add'); ?></h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-2">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"><i class="zmdi zmdi-info"></i> <?php echo app('translator')->getFromJson('general.detail'); ?> </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#standard"><i class="zmdi zmdi-image"></i> استاندارد </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usages"><i class="zmdi zmdi-image"></i> موارد کاربرد </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mazaya"><i class="zmdi zmdi-image"></i> مزایای استفاده </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#vizhegi"><i class="zmdi zmdi-image"></i>ویژگی ها </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#masraf"><i class="zmdi zmdi-image"></i>میزان مصرف </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#amadesazi"><i class="zmdi zmdi-image"></i>آماده سازی طرح </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sakht"><i class="zmdi zmdi-image"></i>طریقه ساخت </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ejra"><i class="zmdi zmdi-image"></i> طریقه اجرا</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#negahdari"><i class="zmdi zmdi-image"></i> شرایط نگهداری </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#time"><i class="zmdi zmdi-image"></i> مدت نگهداری </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#imeni"><i class="zmdi zmdi-image"></i> نکات ایمنی
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fanni"><i class="zmdi zmdi-image"></i> خدمات فنی </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-settings"></i> <?php echo app('translator')->getFromJson('general.setting'); ?> </a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#seo"><i class="zmdi zmdi-settings"></i> <?php echo app('translator')->getFromJson('general.seo_setting'); ?> </a></li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="tab-content">
                                        <!-- tab joziat -->
                                        <div role="tabpanel" class="tab-pane in active" id="details">
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.title'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                                                    <?php if($errors->has('name')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('name')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- category -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.category'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::select('portfolio_categories_id', $categories, null, ['class' => 'form-control ms', 'placeholder' => ''])); ?>

                                                </div>
                                            </div>

                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.default_image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('defaultImage');" style="cursor: pointer" id="span-defaultImage">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('default_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'defaultImage','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('text', ' ', ['class' => 'ckeditor theFirst'])); ?>

                                                    <?php if($errors->has('text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab standard -->
                                        <div role="tabpanel" class="tab-pane" id="standard">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('standard_image');" style="cursor: pointer" id="span-standard">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('standard_image', null, ['class' => 'form-control textright', 'id' => 'standard_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('standard_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('standard_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('standard_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('standard_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('standard_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- tab usages -->
                                        <div role="tabpanel" class="tab-pane" id="usages">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('usages_image');" style="cursor: pointer" id="span-usages">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('usages_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'usages_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('usages_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('usages_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('usages_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('usages_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('usages_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab mazaya -->
                                        <div role="tabpanel" class="tab-pane" id="mazaya">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('mazaya_image');" style="cursor: pointer" id="span-mazaya">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('mazaya_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'mazaya_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('mazaya_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('mazaya_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('mazaya_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('mazaya_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('mazaya_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab vizhegi -->
                                        <div role="tabpanel" class="tab-pane" id="vizhegi">
                                            <a class="btn bg-green addVizhegi" style="position: absolute;top:-45px;left:20px">
                                                <i class="fa fa-plus-circle" style="font-size: 14px"></i>
                                                <span style="font-size: 14px">افزودن</span>
                                            </a>
                                            <div class="vizhegiPack ">
                                                <div class="row clearfix" style="border-top: 1px solid #ccc;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">ویژگی</label>
                                                            <input type="text" class="form-control" placeholder="" name="vizhegi_key[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">توضیحات</label>
                                                            <input type="text" class="form-control" placeholder="" name="vizhegi_value[]">
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-danger delete-row">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- tab masraf -->
                                        <div role="tabpanel" class="tab-pane" id="masraf">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('masraf_image');" style="cursor: pointer" id="span-masraf">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('masraf_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'masraf_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('masraf_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('masraf_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('masraf_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('masraf_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('masraf_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab amadesazi -->
                                        <div role="tabpanel" class="tab-pane" id="amadesazi">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('amadesazi_image');" style="cursor: pointer" id="span-amadesazi">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('amadesazi_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'amadesazi_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('amadesazi_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('amadesazi_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('amadesazi_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('amadesazi_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('amadesazi_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab sakht -->
                                        <div role="tabpanel" class="tab-pane" id="sakht">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('sakht_image');" style="cursor: pointer" id="span-sakht">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('sakht_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'sakht_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('sakht_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('sakht_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('sakht_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('sakht_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('sakht_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab ejra -->
                                        <div role="tabpanel" class="tab-pane" id="ejra">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('ejra_image');" style="cursor: pointer" id="span-ejra">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('ejra_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'ejra_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('ejra_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('ejra_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('ejra_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('ejra_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('ejra_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab negahdari -->
                                        <div role="tabpanel" class="tab-pane" id="negahdari">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('negahdari_image');" style="cursor: pointer" id="span-negahdari">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('negahdari_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'negahdari_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('negahdari_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('negahdari_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('negahdari_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('negahdari_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('negahdari_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab time -->
                                        <div role="tabpanel" class="tab-pane" id="time">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('time_image');" style="cursor: pointer" id="span-time">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('time_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'time_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('time_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('time_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('time_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('time_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('time_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab imeni -->
                                        <div role="tabpanel" class="tab-pane" id="imeni">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('imeni_image');" style="cursor: pointer" id="span-imeni">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('imeni_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'imeni_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('imeni_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('imeni_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('imeni_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('imeni_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('imeni_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- tab fanni -->
                                        <div role="tabpanel" class="tab-pane" id="fanni">
                                            <!-- default_image -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.image'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <div class="previewCont empty22">
                                                        <img src="" alt="">
                                                    </div>
                                                    <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="input-group dirleft">
                                                            <span class="input-group-addon" onclick="BrowseServer('fanni_image');" style="cursor: pointer" id="span-fanni">
                                                                <i class="fa fa-search" style="line-height: 60px;"></i>
                                                            </span>
                                                        <?php echo e(Form::text('fanni_image', null, ['class' => 'form-control textright pfDefaultImage', 'id' => 'fanni_image','style' => 'height:82px;'])); ?>

                                                    </div>
                                                    <?php if($errors->has('fanni_image')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('fanni_image')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- text -->
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.text'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::textarea('fanni_text', ' ', ['class' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                                    <?php if($errors->has('fanni_text')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('fanni_text')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                        </div>


                                        <div role="tabpanel" class="tab-pane" id="settings">
                                            <div class="row clearfix">
                                                <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('general.status'); ?>
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-8 btnGroup">
                                                    <label for="active" class="btn bg-green on">
                                                        <?php echo e(Form::radio('status', '1', '1', ['id' => 'active'])); ?>

                                                        <?php echo app('translator')->getFromJson('form.active'); ?>
                                                    </label>

                                                    <label for="deactive" class="btn btn-default off">
                                                        <?php echo e(Form::radio('status', '2', null, ['id' => 'deactive'])); ?>

                                                        <?php echo app('translator')->getFromJson('form.deactive'); ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.show_view_more'); ?>
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-8 btnGroup">
                                                    <label for="yes1" class="btn btn-default on">
                                                        <?php echo e(Form::radio('show_view_more', '1', null, ['id' => 'yes1'])); ?>

                                                        <?php echo app('translator')->getFromJson('general.yes'); ?>
                                                    </label>

                                                    <label for="no1" class="btn bg-blush off">
                                                        <?php echo e(Form::radio('show_view_more', '2', true, ['id' => 'no1'])); ?>

                                                        <?php echo app('translator')->getFromJson('general.no'); ?>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row clearfix">
                                                <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('portfolio.summary_character_count'); ?>
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <?php echo e(Form::number('summary_character_count', null, ['class' => 'form-control'])); ?>

                                                    <?php if($errors->has('summary_character_count')): ?>
                                                        <spnan class="cr-warning"><?php echo e($errors->first('summary_character_count')); ?></spnan>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="row clearfix">
                                                <label class="col-lg-3 col-md-3 col-sm-4 form-control-label text-left">
                                                    <span class="required">*</span>
                                                    <?php echo app('translator')->getFromJson('general.language'); ?>
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <?php echo e(Form::select('language',
                                                        [
                                                            'fa' => 'Fa',
                                                            'en' => 'En',
                                                        ]
                                                        , app()->getLocale(), ['class' => 'form-control ms', 'placeholder' => ''])); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="seo">
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <?php echo app('translator')->getFromJson('general.seo_title'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::text('title_seo', null, ['class' => 'form-control'])); ?>

                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <?php echo app('translator')->getFromJson('general.seo_keywords'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::text('keyword_seo', null, ['class' => 'form-control'])); ?>

                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                                    <?php echo app('translator')->getFromJson('general.seo_description'); ?>
                                                </label>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <?php echo e(Form::text('description_seo', null, ['class' => 'form-control'])); ?>

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
    <?php echo e(Form::close()); ?>

    <script>
        $('#portfolios, #portfolio_list').addClass('active');
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>