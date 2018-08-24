<?php if(count($data) > 0): ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="direction: ltr; text-align: right">
            <td class="text-center text-middle">
                <label for="chk-<?php echo e($row->id); ?>" class="unchecked">
                    <?php echo e(Form::checkbox('items[]', $row->id, null, ['id' => 'chk-' . $row->id])); ?>

                </label>
            </td>
            <td class="text-middle text-center">
                <a href="<?php echo e(url($row->image)); ?>" class="fancybox" rel="slide_<?php echo e($row->slide_show_categories_id); ?>">
                    <img src="<?php echo e(url($row->image)); ?>" class="img-thumbnail" style="height: 35px !important;">
                </a>
            </td>
            <td class="text-middle">
                <?php if (Auth::check() && Auth::user()->can('edit.slide_show')): ?>
                <a href="<?php echo e(url('panel/slide_show/' . $row->id . '/edit')); ?>">
                <?php endif; ?>
                    <?php echo e($row->name); ?>

                <?php if (Auth::check() && Auth::user()->can('edit.slide_show')): ?>
                <i class="fa fa-pencil"></i>
                </a>
                <?php endif; ?>
            </td>
            <td class="text-center text-middle"><?php echo e($row->slide_show_categories->name); ?></td>
            <td class="text-center text-middle"><?php echo e($row->language); ?></td>
            <td class="text-center text-middle">
                <?php if (Auth::check() && Auth::user()->can('edit.slide_show')): ?>
                <a class="action status" data-value="<?php echo e($row->status == 1 ? 2 : 1); ?>" data-id="<?php echo e($row->id); ?>" href="<?php echo e(url('panel/slide_show/status')); ?>">
                <?php endif; ?>
                    <?php if($row->status=="1"): ?>
                        <i class="fa fa-star" style="color:#5cb85c" title="<?php echo app('translator')->getFromJson('general.active'); ?>"></i>
                    <?php else: ?>
                        <i class="fa fa-star-o" style="color:red;" title="<?php echo app('translator')->getFromJson('general.deactive'); ?>"></i>
                    <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->can('edit.slide_show')): ?>
                </a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td colspan="10" style="text-align: center"><?php echo e($data->appends($filter)->links()); ?></td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="15" style="padding: 10px; text-align: center; background-color: #fff">
            <b><i><?php echo app('translator')->getFromJson('general.no_result'); ?></i></b>
        </td>
    </tr>
<?php endif; ?>