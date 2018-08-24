<!DOCTYPE html>
<html>
<title>Pyramid Control Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo e(asset('general/css/bootstrap.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('general/css/font-awesome.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admin/css/color_skins.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admin/css/customs.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admin/css/main.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('admin/css/rtl.css')); ?>" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="<?php echo e(url('general/images/fav.png')); ?>">
<style>
    body, html {
        height: 100%;
    }
    .bgimg {
        min-height: 100%;
        background-position: center;
        background-size: cover;
    }
    .form-control {
        width: 100%;
    }
</style>

<body class="theme-cyan authentication sidebar-collapse">
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background: url('<?php echo e(url('admin/images/Background-Pyramid.jpg')); ?>'); background-position: top center!important; "></div>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <footer class="footer" style="bottom: 0px">
        <div class="container">
            <span style="text-align: center">Design & Implement by Feel Sefid Agancy</span>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script type='text/javascript' src='<?php echo e(asset('admin/js/vendorscripts.bundle.js')); ?>'></script>
<script type='text/javascript' src='<?php echo e(asset('admin/js/libscripts.bundle.js')); ?>'></script>

<script>
    $(".navbar-toggler").on('click',function() {
        $("html").toggleClass("nav-open");
    });
    //=============================================================================
    $('.form-control').on("focus", function() {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });
</script>
</body>

</html>