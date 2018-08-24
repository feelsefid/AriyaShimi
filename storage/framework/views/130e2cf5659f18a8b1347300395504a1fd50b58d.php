<?php $__env->startSection('content'); ?>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h2><?php echo app('translator')->getFromJson('portfolio.category'); ?></h2>
            </div>
            <div class="col-md-9">
                <input type="hidden" name="save" id="saveMethod" value="">
                <?php if (Auth::check() && Auth::user()->can('delete.portfolio_category')): ?>
                <a class="btn btn-sm pull-left bg-blush delete" href="<?php echo e(url('panel/portfolio_category')); ?>">
                    <i class="fa fa-trash"></i>
                    <?php echo app('translator')->getFromJson('form.delete'); ?>
                </a>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->can('edit.portfolio_category')): ?>
                <a class="btn btn-sm bg-blue pull-left actived" href="<?php echo e(url('panel/portfolio_category/status')); ?>">
                    <i class="fa fa-star"></i>
                    <?php echo app('translator')->getFromJson('form.active'); ?>
                </a>
                <a class="btn btn-sm bg-grey pull-left deactived" href="<?php echo e(url('panel/portfolio_category/status')); ?>">
                    <i class="fa fa-star-o"></i>
                    <?php echo app('translator')->getFromJson('form.deactive'); ?>
                </a>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->can('create.portfolio_category')): ?>
                <a class="btn btn-sm bg-green pull-left" href="<?php echo e(url('panel/portfolio_category/create')); ?>">
                    <i class="fa fa-plus"></i>
                    <?php echo app('translator')->getFromJson('form.add'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><?php echo app('translator')->getFromJson('side_menu.portfolio_categories'); ?></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" style="min-height: 350px">
                            <form action="<?php echo e(url('panel/portfolio_category')); ?>" method="GET" id="search">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-bordered" id="grid">
                                    <thead>
                                        <tr>
                                            <td style="width: 3%">
                                                <label for="selectAll" class="unchecked">
                                                    <input type="checkbox" name="selectAll" id="selectAll">
                                                </label>
                                            </td>

                                            <td style="width: 72%" class="text-right">
                                                <a id="srch_name_sort" class="sort">
                                                    <input type="hidden" name="srch_name_sort">
                                                    <i class="fa fa-arrow-circle-up text-default"></i>
                                                </a>
                                                <input type="text" name="srch_name" value="" class="form-control" placeholder="<?php echo app('translator')->getFromJson('portfolio.category_title'); ?>">
                                            </td>

                                            <td style="width: 10%" class="text-right">
                                                <a id="srch_language_sort" class="sort">
                                                    <input type="hidden" name="srch_language_sort">
                                                    <i class="fa fa-arrow-circle-up text-default"></i>
                                                </a>
                                                <select name="srch_language" class="form-control ms">
                                                    <option value=""><?php echo app('translator')->getFromJson('general.language'); ?></option>
                                                    <option value="fa">Fa</option>
                                                    <option value="en">En</option>
                                                </select>
                                            </td>

                                            <td style="width: 15%">
                                                <select name="srch_status" class="form-control ms">
                                                    <option value=""><?php echo app('translator')->getFromJson('general.status'); ?></option>
                                                    <option value="1"><?php echo app('translator')->getFromJson('form.active'); ?></option>
                                                    <option value="2"><?php echo app('translator')->getFromJson('form.deactive'); ?></option>
                                                </select>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $__env->make('admin.portfolio_category.grid', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#portfolios, #portfolio_category').addClass('active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>