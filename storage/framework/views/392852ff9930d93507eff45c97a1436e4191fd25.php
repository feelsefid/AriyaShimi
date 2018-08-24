<?php $__env->startSection('content'); ?>
    <script>
        $('#dashboard').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>