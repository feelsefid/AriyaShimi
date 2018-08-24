<?php if(count($data) > 0): ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="direction: ltr; text-align: right">
            <td class="text-center">
                <label for="chk-<?php echo e($row->id); ?>" class="unchecked">
                    <?php echo e(Form::checkbox('items[]', $row->id, null, ['id' => 'chk-' . $row->id])); ?>

                </label>
            </td>
            <td>
                <?php if (Auth::check() && Auth::user()->can('edit.portfolio')): ?>
                <a href="<?php echo e(url('panel/portfolio/' . $row->id . '/edit')); ?>">
                <?php endif; ?>
                    <?php echo e($row->name); ?>

                <?php if (Auth::check() && Auth::user()->can('edit.portfolio')): ?>
                <i class="fa fa-pencil"></i>
                </a>
                <?php endif; ?>
            </td>
            <td class="text-center"><?php echo e($row->portfolio_categories->name); ?></td>
            <td class="text-center"><?php echo e($row->language); ?></td>
            <td class="text-center">
                <?php if (Auth::check() && Auth::user()->can('edit.portfolio')): ?>
                <a class="action status" data-value="<?php echo e($row->status == 1 ? 2 : 1); ?>" data-id="<?php echo e($row->id); ?>" href="<?php echo e(url('panel/portfolio/status')); ?>">
                <?php endif; ?>
                    <?php if($row->status=="1"): ?>
                        <i class="fa fa-star" style="color:#5cb85c" title="<?php echo app('translator')->getFromJson('general.active'); ?>"></i>
                    <?php else: ?>
                        <i class="fa fa-star-o" style="color:red;" title="<?php echo app('translator')->getFromJson('general.deactive'); ?>"></i>
                    <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->can('edit.portfolio')): ?>
                </a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td colspan="10" style="background-color: #fff; text-align: center; padding: 10px">
            <div class="col-lg-6 col-md-6 pull-left" style="margin-top: 5px">
                <?php echo e(Form::select('srch_paginate',
                    [
                        '*' => trans('general.all'),
                        20 => 20,
                        50 => 50,
                        100 => 100,
                        250 => 250
                    ], $filter['srch_paginate'], ['class' => 'ms form-control col-md-1 col-lg-1 pull-left'])); ?>


                <span class="pull-left" style="margin: 12px 10px">
                    <?php echo app('translator')->getFromJson('general.paginate_text', [
                        'from' => $data->currentPage() * $data->perPage() - $data->perPage() + 1,
                        'to' => $data->currentPage() * $data->perPage() > $data->total() ? $data->total() : $data->currentPage() * $data->perPage(),
                        'all' => $data->total()
                    ]); ?>
                </span>
            </div>
            <div class="col-lg-6 col-md-6 pull-left" style="float: right; margin-top: 5px">
                <?php echo e($data->appends($filter)->links()); ?>

            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="15" style="padding: 10px; text-align: center; background-color: #fff">
            <b><i><?php echo app('translator')->getFromJson('general.no_result'); ?></i></b>
        </td>
    </tr>
<?php endif; ?>