<li>
    <a class="nhidden-sm-down" href="<?php echo e(url('/')); ?>" target="_blank" data-close="true">
        <i class="zmdi zmdi-eye"></i>
    </a>
</li><!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="<?php echo e(@$setting['seo_keywords']); ?>">
    <meta name="description" content="<?php echo e(@$settings['seo_description']); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(url('general/images/fav.png')); ?>" />
    <base href="<?php echo e(url('/')); ?>">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title>Pyramid Control Panel</title>
    <!-- Scripts -->
    <script src="<?php echo e(asset('general/js/jquery-1.9.1.min.js')); ?>"></script>


    <script src="<?php echo e(asset('general/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('general/libs/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset("general/libs/fancybox/jquery.fancybox.js")); ?>"></script>

    <!-- Core Js -->
    <script src="<?php echo e(asset('admin/libs/bundles/vendorscripts.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/bundles/mainscripts.bundle.js')); ?>"></script>

    <!-- ckeditor -->
    <script src="<?php echo e(asset('admin/libs/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/ckeditor/adapters/jquery.js')); ?>"></script>

    <!--SORTABLE-->
    <script src="<?php echo e(asset('admin/js/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/script.js')); ?>"></script>

    <!--AJAX-->
    <script src="<?php echo e(asset('admin/js/ajax.js')); ?>"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('general/css/bootstrap.min.css')); ?>">
    <link href="<?php echo e(asset('admin/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/color_skins.css')); ?>" rel="stylesheet">
    <?php if(trans('general.direction') == 'rtl'): ?>
        <link href="<?php echo e(asset('admin/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>
    <link href="<?php echo e(asset('admin/css/customs.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('general/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('general/libs/fancybox/jquery.fancybox.css')); ?>" rel="stylesheet">


    <link href="<?php echo e(asset('admin/plugins/jqvmap.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(asset('admin/js/canvasjs.min.js')); ?>"></script>


<style>
    *{
        z-index: 33;
    }

</style>

</head>
<body class="theme-red menu_dark <?php echo app('translator')->getFromJson('general.direction'); ?>">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo e(url('general/images/pyramid-logo.png')); ?>" width="48" height="48" alt="Compass"></div>
        <p style="direction: ltr">Pyramid...</p>
    </div>
</div>



<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<?php echo $__env->make('admin.AlertAndDeleteModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Top Bar -->
<nav class="navbar" style="z-index: 999999 !important;">
    <div class="col-12">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
                <span class="m-l-10" style="font-size: 13px;color:#FFF;">
                    <?php $date = new DateTime(); ?>
                    <?php echo e(\App\Providers\jDateTime::getDayNames($date->format('D'))); ?>

                    <?php echo e(\App\Providers\jDateTime::date('Y/m/d')); ?>

                </span>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li style="color: #fff; line-height: 60px; font-weight: normal !important; font-size: 13px; padding-right: 10px"><?php echo app('translator')->getFromJson('general.identify'); ?> : <?php if(auth()->check()): ?> <?php echo e(auth()->user()->name); ?> <?php endif; ?></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="padding-top: 15px">
            <li>
                <a class="nhidden-sm-down" href="<?php echo e(url('/')); ?>" target="_blank" data-close="true">
                    <i class="zmdi zmdi-eye"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true">
                    <i class="zmdi zmdi-fullscreen"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('logout')); ?>" class="mega-menu" data-close="true"
                   onclick="event.preventDefault();
                document.getElementById('logout-form').submit()">
                    <i class="zmdi zmdi-power"></i>
                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
        </ul>
    </div>
</nav>

<!-- Right Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>" style="text-align: center" target="_blank">
                        <img src="<?php echo e(url('general/images/pyramid-logo.png')); ?>" alt="Pyramid CMS" class="logo">
                    </a>
                </div>
                <hr class="style-two">
            </li>
            <li id="dashboard">
                <a href="<?php echo e(url('panel')); ?>">
                    <i class="zmdi zmdi-home"></i><span><?php echo app('translator')->getFromJson('side_menu.dashboard'); ?></span>
                </a>
            </li>
            <li id="articles">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="zmdi zmdi-file"></i><span><?php echo app('translator')->getFromJson('side_menu.articles'); ?></span>
                </a>
                <ul class="ml-menu">
                    <li id="article_list"><a href="<?php echo e(url('panel/article')); ?>"><?php echo app('translator')->getFromJson('side_menu.article_list'); ?></a></li>
                    <li id="article_category"><a href="<?php echo e(url('panel/article_category')); ?>"><?php echo app('translator')->getFromJson('side_menu.article_categories'); ?></a></li>
                </ul>
            </li>
            <li id="portfolios">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="zmdi zmdi-file"></i><span><?php echo app('translator')->getFromJson('side_menu.portfolios'); ?></span>
                </a>
                <ul class="ml-menu">
                    <li id="portfolio_list"><a href="<?php echo e(url('panel/portfolio')); ?>"><?php echo app('translator')->getFromJson('side_menu.portfolio_list'); ?></a></li>
                    <li id="portfolio_category"><a href="<?php echo e(url('panel/portfolio_category')); ?>"><?php echo app('translator')->getFromJson('side_menu.portfolio_categories'); ?></a></li>
                </ul>
            </li>
            <li id="menus">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="zmdi zmdi-view-toc"></i><span><?php echo app('translator')->getFromJson('side_menu.menus'); ?></span>
                </a>
                <ul class="ml-menu">
                    <li id="menu_list"><a href="<?php echo e(url('panel/menu')); ?>"><?php echo app('translator')->getFromJson('side_menu.menu_list'); ?></a></li>
                    <li id="menu_category"><a href="<?php echo e(url('panel/menu_category')); ?>"><?php echo app('translator')->getFromJson('side_menu.menu_categories'); ?></a></li>
                </ul>
            </li>
            <li id="modules">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="zmdi zmdi-apps"></i><span><?php echo app('translator')->getFromJson('side_menu.modules'); ?></span>
                </a>
                <ul class="ml-menu">
                    <li id="slide_show"><a href="<?php echo e(url('panel/slide_show')); ?>"><?php echo app('translator')->getFromJson('side_menu.slide_show'); ?></a></li>
                    <li id="slide_show_category"><a href="<?php echo e(url('panel/slide_show_category')); ?>"><?php echo app('translator')->getFromJson('side_menu.slide_show_category'); ?></a></li>
                    <li id="team"><a href="<?php echo e(url('panel/team')); ?>"><?php echo app('translator')->getFromJson('side_menu.teams'); ?></a></li>
                    
                    <li id="deg360"><a href="<?php echo e(url('panel/deg360')); ?>"><?php echo app('translator')->getFromJson('side_menu.deg360'); ?></a></li>
                </ul>
            </li>
            <li id="filemanager">
                <a onclick="BrowseServer('file');">
                    <i class="zmdi zmdi-folder"></i><span><?php echo app('translator')->getFromJson('side_menu.filemanager'); ?></span>
                </a>
            </li>
            <li id="users">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="zmdi zmdi-accounts"></i><span>مدیران</span>
                </a>
                <ul class="ml-menu">
                    <li id="user_list"><a href="<?php echo e(url('panel/user')); ?>">لیست مدیران</a></li>
                    <li id="role_list"><a href="<?php echo e(url('panel/role')); ?>"><?php echo app('translator')->getFromJson('side_menu.roles_list'); ?></a></li>
                    <li id="permission_list"><a href="<?php echo e(url('panel/permission')); ?>"><?php echo app('translator')->getFromJson('side_menu.permissions_list'); ?></a></li>
                </ul>
            </li>
            <li id="setting">
                <a href="<?php echo e(url('panel/setting')); ?>">
                    <i class="zmdi zmdi-settings"></i><span><?php echo app('translator')->getFromJson('side_menu.system_settings'); ?></span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Content -->
<section class="content" style="padding-bottom: 30px !important;;">
    <?php echo $__env->yieldContent('content'); ?>
</section>

<footer class="footer" style="padding: 10px 0px; position: fixed; bottom: 0px; width: 100%; color: #fff; background-color: #212121; z-index: 9">
    <p style="text-align: left; padding-left: 30px; margin-bottom: 0px">Design & Implement by Feel Sefid Agancy</p>
</footer>

<!-- Custom Js -->
<script src="<?php echo e(asset('admin/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/grid.js')); ?>"></script>
<script>
    $('.fancybox').fancybox();
</script>
<script src="<?php echo e(asset('admin/plugins/jquery.vmap.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/jquery.vmap.world.js')); ?>"></script>
<?php echo $__env->yieldContent('end'); ?>
</body>
</html>
