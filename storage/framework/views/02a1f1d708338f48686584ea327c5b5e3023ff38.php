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
<body class="home page page-id-12 page-parent page-template-default btx-layout btx-layout--wide btx-layout-responsive btx-layout--topnav btx-layout--fixednav" data-scheme="light" data-layout="wide">
<div class="btx-wrapper btx-p-bg-bg btx-home hide-border">
    <header class="btx-header" data-transparent="" data-height="90">
        <nav class="btx-navbar btx-navbar--standard btx-light-scheme btx-highlight-default btx-navbar-dropdown-dark-scheme btx-navbar--center btx-navbar--custom" data-height="90" data-style="standard" data-fixed="true" data-height_fixed="60" data-autohide="true" data-transition="custom-change" data-transition_point="1">
            <div class="btx-container--fullwidth">
                <div class="btx-navbar-content-wrapper">
                    <div class="btx-navbar-header">
                        <a class="btx-navbar-brand" href="<?php echo e(url('/')); ?>">
                            <img src="<?php echo e(url($setting->logo2)); ?>" alt="">
                        </a>
                    </div>
                    <div class="btx-button btx-button--fill btx-button-hover--brand btx-button-size--small btx-button-color--brand btx-navbar-widget">
                        <a href="#" target="_blank">En |</a>
                        <a href="#" target="_blank">Ar |</a>
                        <a href="#" target="_blank">Ru</a>
                    </div>
                    <ul id="menu-main-menu" class="btx-navbar-nav btx-menu">
                        <?php $__currentLoopData = app('App\Http\Controllers\Site\MenuController')->index(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="menu-item menu-item-has-children">
                                <a href="<?php echo e(url($row['link'])); ?>" id="<?php echo e($row['slug']); ?>"><?php echo e($row['name']); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="btx-header-widgets btx-left-alignment btx-light-scheme">
            <div class="btx-header-widgets-content">
                <div class="btx-container--fullwidth">
                    <div class="btx-row">
                        <div class="btx-header-widgets-column btx-p-border-border btx-col-3">
                        </div>
                        <div class="btx-header-widgets-column btx-p-border-border btx-col-3">
                        </div>
                        <div class="btx-header-widgets-column btx-p-border-border btx-col-3">
                        </div>
                        <div class="btx-header-widgets-column btx-p-border-border btx-col-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="btx-navbar--mobile btx-navbar--mobile-standard btx-navbar--minimal btx-navbar--minimal--full btx-light-scheme" data-height="60" data-fixed="true" data-autohide="true" data-transition="custom-change" data-transition_point="1">
            <div class="btx-container--fullwidth">
                <div class="btx-navbar-content-wrapper">
                    <div class="btx-navbar-header">
                        <a class="btx-navbar-brand" href="<?php echo e(url('/')); ?>">
                            <img src="<?php echo e(url($setting->logo2)); ?>" alt="">
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

    <main class="btx-content btx-content--no-header" id="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="btx-footer btx-dark-scheme type-footer-bottombar">
        <div class="btx-footer-widgets btx-right-align direction-rtl">
            <div class="btx-container">
                <div class="btx-footer-widgets-content">
                    <div class="btx-row">
                        <div class="float-right btx-footer-column btx-p-border-border btx-col-3">
                            <div class="btx-widgets">
                                <ul class="btx-widgets-list">
                                    <li id="text-19" class="widget widget_text">
                                        <div class="btx-heading btx-heading--default btx-heading--underline btx-p-border-border btx-s-text-border">
                                            <h3 class="btx-heading-text  btx-s-text-color">درباره ما</h3>
                                        </div>
                                        <div class="textwidget text-justify">شرکت آریاشیمی با بیش از ۱۲ سال سابقه مفید و درخشان در زمینه تولید انواع مواد شیمیایی ساختمان و مواد افزودنی بتن، تلاش دارد تا به عنوان برندی پیشرو و نوآور فعالیت کند.</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="float-right btx-footer-column btx-p-border-border btx-col-3">
                            <div class="btx-widgets">
                                <ul class="btx-widgets-list">
                                    <li id="bateaux_widget_post-20" class="widget btx-widget btx-widget-blog">
                                        <div class="btx-heading btx-heading--default btx-heading--underline btx-p-border-border btx-s-text-border">
                                            <h3 class="btx-heading-text  btx-s-text-color"><?php echo app('translator')->getFromJson('contact.contact_us'); ?></h3>
                                        </div>
                                        <div class="textwidget text-justify">
                                            <span class="fa fa-map" ></span>
                                            <?php echo e(json_decode($setting->address)->{0}->address); ?>

                                            <br/>
                                            <span class="fa fa-phone" ></span>
                                            <?php echo e(json_decode($setting->phone)->{0}->number); ?>

                                            <br/>
                                            <span class="fa fa-fax" ></span>
                                            <?php echo e(json_decode($setting->fax)->{0}->number); ?>

                                            <br/>
                                            <span class="fa fa-envelope" ></span>
                                            <?php echo e(json_decode($setting->email)->{0}->email); ?>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="float-right btx-footer-column btx-p-border-border btx-col-3">
                            <div class="btx-widgets">
                                <ul class="btx-widgets-list">
                                    <li id="nav_menu-28" class="widget widget_nav_menu">
                                        <div class="btx-heading btx-heading--default btx-heading--underline btx-p-border-border btx-s-text-border">
                                            <h3 class="btx-heading-text  btx-s-text-color"><?php echo e($footerMenuLinks->name); ?></h3>
                                        </div>

                                        <ul id="menu-footer-menu-3" class="btx-menu">
                                            <?php $__currentLoopData = $footerMenuLinks->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li id="menu-item-3083" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3083">
                                                    <a href="<?php echo e($row->link); ?>"><?php echo e($row->name); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="float-right btx-footer-column btx-p-border-border btx-col-3">
                            <div class="btx-widgets">
                                <ul class="btx-widgets-list">
                                    <li id="tag_cloud-10" class="widget widget_tag_cloud">
                                        <div class="btx-heading btx-heading--default btx-heading--underline btx-p-border-border btx-s-text-border">
                                            <h3 class="btx-heading-text  btx-s-text-color"><?php echo e($footerMenuLabels->name); ?></h3>
                                        </div>
                                        <div class="tagcloud">
                                            <?php $__currentLoopData = $footerMenuLabels->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href='<?php echo e($row->link); ?>' class='tag-link-41 tag-link-position-<?php echo e($loop->iteration); ?>' title='<?php echo e($row->name); ?>' style='font-size: 22pt;'>
                                                    <?php echo e($row->name); ?>

                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btx-bottombar btx-p-border-border">
            <div class="btx-container">
                <div class="btx-bottombar-content btx-p-border-border">
                    <div class="btx-widgets right">
                        <div class="widget btx-widget-text direction-rtl" style="line-height: 20px !important;">
                            <?php echo app('translator')->getFromJson('general.footer_text_inverse'); ?>
                        </div>
                    </div>
                    <div class="btx-widgets left">
                        <div class="widget btx-widget-social">
                            <div class="btx-social btx-social--plain">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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