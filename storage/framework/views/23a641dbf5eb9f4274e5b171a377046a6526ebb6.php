<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['url' => url('panel/article'), 'class' => 'form-horizontal ajax-submit', 'role' => 'form'])); ?>

        <?php echo e(csrf_field()); ?>

        <div class="block-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h2><?php echo app('translator')->getFromJson('side_menu.articles'); ?></h2>
                </div>
                <div class="col-md-9">
                    <input type="hidden" name="save" id="saveMethod" value="">

                    <a href="<?php echo e(url('panel/article')); ?>" class="btn btn-sm btn-back pull-left bg-blush">
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
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo app('translator')->getFromJson('article.add'); ?></h2>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details"><i class="zmdi zmdi-info"></i> <?php echo app('translator')->getFromJson('general.detail'); ?> </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images"><i class="zmdi zmdi-image"></i> <?php echo app('translator')->getFromJson('general.image'); ?> </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#videos"><i class="zmdi zmdi-image"></i> <?php echo app('translator')->getFromJson('general.video'); ?> </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-settings"></i> <?php echo app('translator')->getFromJson('general.setting'); ?> </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#seo"><i class="zmdi zmdi-settings"></i> <?php echo app('translator')->getFromJson('general.seo_setting'); ?> </a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="details">
                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            <span class="required">*</span>
                                            <?php echo app('translator')->getFromJson('article.category'); ?>
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <?php echo e(Form::select('article_categories_id', $categories, null, ['class' => 'form-control ms', 'placeholder' => ''])); ?>

                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            <span class="required">*</span>
                                            <?php echo app('translator')->getFromJson('article.title'); ?>
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                                            <?php if($errors->has('name')): ?>
                                                <spnan class="cr-warning"><?php echo e($errors->first('name')); ?></spnan>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row clearfix engName">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            <span class="required">*</span>
                                            <?php echo app('translator')->getFromJson('article.engName'); ?>
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <?php echo e(Form::text('engName', null, ['class' => 'form-control'])); ?>

                                            <?php if($errors->has('engName')): ?>
                                                <spnan class="cr-warning"><?php echo e($errors->first('engName')); ?></spnan>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <label class="col-lg-2 col-md-2 col-sm-4 form-control-label text-left">
                                            <span class="required">*</span>
                                            <?php echo app('translator')->getFromJson('article.text'); ?>
                                        </label>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <?php echo e(Form::textarea('text', ' ', ['id' => 'ckeditor', 'cols' => 100, 'rows' => 10])); ?>

                                            <?php if($errors->has('text')): ?>
                                                <spnan class="cr-warning"><?php echo e($errors->first('text')); ?></spnan>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="images">
                                    <a class="btn bg-green btn-clone" style="position: absolute; top:50px; left:20px" data-target="image">
                                        <i class="fa fa-plus-circle" style="font-size: 14px"></i>
                                        <span style="font-size: 14px"><?php echo app('translator')->getFromJson('general.add_image'); ?></span>
                                    </a>

                                    <div class="form-group textright" id="image">
                                        <div class="col-sm-12 col-md-6 clone-row" style="float: right;height: 60px;line-height: 60px;margin-top: 40px;">
                                            <div class="previewCont empty22"></div>
                                            <a href="" class="text-danger delete-row1 delete-row col-md-1">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="input-group dirleft">
                                                <span class="input-group-addon" onclick="BrowseServer('image-1');" style="cursor: pointer" id="span-image-1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                                <?php echo e(Form::text('image[]', null, ['class' => 'form-control textright', 'id' => 'image-1'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="videos">
                                    <a class="btn bg-green btn-clone" style="position: absolute; top:50px; left:20px" data-target="video|thumb">
                                        <i class="fa fa-plus-circle" style="font-size: 14px"></i>
                                        <span style="font-size: 14px"><?php echo app('translator')->getFromJson('general.add_video'); ?></span>
                                    </a>
                                    <div>
                                        <div class="col-sm-6 col-md-6" style="float: right"><?php echo app('translator')->getFromJson('general.video_file'); ?></div>
                                        <div class="col-sm-6 col-md-6" style="float: right"><?php echo app('translator')->getFromJson('general.thumbnail'); ?></div>
                                    </div>

                                    <div class="form-group textright" id="video">
                                        <div class="col-sm-12 col-md-12 clone-row" style="float: right">
                                            <a href="#" class="text-danger delete-row">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="input-group dirleft">
                                                <span class="input-group-addon" onclick="BrowseServer('video-1');" style="cursor: pointer" id="span-video-1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                                <?php echo e(Form::text('video[]', null, ['class' => 'form-control textright', 'id' => 'video-1'])); ?>


                                                <span class="input-group-addon" onclick="BrowseServer('thumb-1');" style="cursor: pointer; margin-right: 10px" id="span-thumb-1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                                <?php echo e(Form::text('thumb[]', null, ['class' => 'form-control textright', 'id' => 'thumb-1'])); ?>

                                            </div>
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
                                            <?php echo app('translator')->getFromJson('article.show_view_more'); ?>
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
                                            <?php echo app('translator')->getFromJson('article.summary_character_count'); ?>
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
    <?php echo e(Form::close()); ?>

    <script>
        $('#articles, #article_list').addClass('active');
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>