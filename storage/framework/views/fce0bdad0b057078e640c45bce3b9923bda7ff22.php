<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
    <!-- META TAGS -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->yieldContent('seo'); ?>
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/css/font-awesome.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/LayerSlider/static/css/layerslider.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/css/woocommerce-layout.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/css/woocommerce.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/js/mediaelement/mediaelementplayer.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/js/mediaelement/wp-mediaelement.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/css/main.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/css/style-customabae.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/css/configs.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/js/wp-google-maps-pro/css/wpgmza_style_pro.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/site/js/wp-google-maps-pro/css/data_table_front.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo e(url('/')); ?>/general/css/custom.css' type='text/css' media='all' />
    <link rel="icon" type="image/x-icon" href="<?php echo e(url('' . @$setting->favicon)); ?>" />
</head>

<body class="page page-id-743 page-child parent-pageid-12 page-template-default btx-layout btx-layout--wide btx-layout-responsive btx-layout--sidenav btx-layout--sidenav-minimal btx-layout--sidenav-minimal-left" data-scheme="light" data-layout="wide">
<div class="btx-page-load btx-p-bg-bg">
    <div class="btx-page-load-spinner">
        <div class="btx-loading btx-loading--double-bounce">
            <div class="btx-bounce btx-p-brand-bg btx-bounce--1"></div>
            <div class="btx-bounce btx-p-brand-bg btx-bounce--2"></div>
        </div>
    </div>
</div>
<div class="btx-wrapper btx-p-bg-bg">
    <nav class="btx-side-navbar btx-light-scheme btx-side-navbar--right btx-side-navbar--minimal btx-highlight-default" data-style="minimal" data-position="right">
        <div class="btx-side-navbar-nav">
            <a class="btx-collapsed-button btx-collapsed-button--minimal" href="#" data-target=".btx-collapsed-menu"><span class="btx-lines"></span></a>
        </div>
        <div class="btx-container">
            <div class="btx-navbar-content-wrapper">
                <div class="btx-collapsed-menu btx-collapsed-menu--minimal">
                    <div class="btx-navbar-header">
                        <a class="btx-navbar-brand" href="index.html">
                            <img src="<?php echo e(url('' . @$setting->logo)); ?>">
                        </a>
                    </div>
                    <ul id="menu-main-menu" class="btx-navbar-nav btx-menu">
                        <?php $__currentLoopData = app('App\Http\Controllers\Site\MenuController')->index(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="menu-item menu-item-has-children">
                                <a href="<?php echo e(url($row['link'])); ?>" id="<?php echo e($row['slug']); ?>"><?php echo e($row['name']); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <div class="btx-widgets">
                        <ul class="btx-widgets-list">
                            <li id="bateaux_widget_social-6" class="widget btx-widget btx-widget-social">
                                <div class="btx-social">
                                    <div class="btx-social-inner">
                                        <?php $__currentLoopData = json_decode($setting->socials); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e($value); ?>" class="btx-social-item btx-social-<?php echo e($key); ?>" target="_blank">
                                                <span class="btx-icon btx-icon--with-hover btx-icon--plain btx-icon--hover-plain btx-icon--small">
                                                    <span class="btx-icon-normal btx-icon-plain btx-p-text-color" >
                                                        <i class="fa fa-<?php echo e($key); ?>"></i>
                                                    </span>
                                                    <span class="btx-icon-hover btx-icon-plain btx-p-brand-color" >
                                                        <i class="fa fa-<?php echo e($key); ?>"></i>
                                                    </span>
                                                </span>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div style="display: inline-block; padding: 0px 5px;"><a href="#">En</a></div>
                                <div style="display: inline-block; padding: 0px 5px;"><a href="#">Ar</a></div>
                                <div style="display: inline-block; padding: 0px 5px;"><a href="#">Ru</a></div>
                            </li>
                            <li id="text-8" class="widget widget_text">
                                <div class="text-right">
                                    <?php echo app('translator')->getFromJson('general.footer_text'); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header class="btx-header" data-transparent="" data-height="0">
        <nav class="btx-navbar--mobile btx-navbar--mobile-standard btx-navbar--minimal btx-navbar--minimal--full btx-light-scheme" data-height="60" data-fixed="true" data-autohide="true" data-transition="custom-change" data-transition_point="1">
            <div class="btx-container--fullwidth">
                <div class="btx-navbar-content-wrapper">
                    <div class="btx-navbar-header">
                        <a class="btx-navbar-brand" href="index.html">
                            <img src="<?php echo e(url('/')); ?>/site/images/logo/loho-AryaShimi.png" alt="">
                        </a>
                    </div>

                    <a class="btx-collapsed-button" href="#" data-target=".btx-collapsed-menu">
                        <span class="btx-lines"></span>
                    </a>
                    <div class="btx-button btx-button--fill btx-button-hover--brand btx-button-size--small btx-button-color--brand btx-navbar-widget">
                        <a href="#" target="_blank">En |</a>
                        <a href="#" target="_blank">Ar |</a>
                        <a href="#" target="_blank">Ru</a>
                    </div>
                    <div class="btx-collapsed-menu btx-collapsed-menu--full">
                        <div class="btx-navbar-background">
                            <div class="btx-background-wrapper"></div>
                            <div class="btx-background-overlay btx-p-bg-bg"></div>
                        </div>
                        <div class="btx-collapsed-menu-inner">
                            <ul id="menu-main-menu-1" class="btx-navbar-nav btx-menu">
                                <?php $__currentLoopData = app('App\Http\Controllers\Site\MenuController')->index(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="menu-item menu-item-has-children">
                                        <a href="<?php echo e(url($row['link'])); ?>" id="<?php echo e($row['slug']); ?>"><?php echo e($row['name']); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <?php echo $__env->yieldContent('content'); ?>
</div>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/jquery/jquery.js'></script>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var BateauxOptions = {"ajax_url":"js/admin-ajax.html"};
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/mediaelement/mediaelement-and-player.min.js'></script>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/mediaelement/wp-mediaelement.min.js'></script>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/hoverIntent.min.js'></script>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/jquery/ui/widget.min.js'></script>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/main-vendors.min.js'></script>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/main.min.js'></script>
<script type='text/javascript' src='<?php echo e(url('/')); ?>/site/js/contact-form.js'></script>

<script>
    $('.feelsefid').mouseover(function(){
        $('#logofooter').removeClass('logofooter').addClass('logofooter-hover');
    }).mouseout(function() {
        $('#logofooter').removeClass('logofooter-hover').addClass('logofooter');
    });
</script>
</body>
</html>