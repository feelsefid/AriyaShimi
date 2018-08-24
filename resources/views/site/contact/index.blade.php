@extends('layouts.second')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection

@section('content')
    <main class="btx-content btx-content--no-header" id="main">
        <article id="post-1321" class="btx-content-wrapper post-1321 page type-page status-publish hentry">

            <div class="btx-main btx-main--single">
                <div class="btx-main-wrapper">
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="0">
                        <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-wrapper">
                                <div class="btx-background-inner" style="background-image:url({{ url('/') }}/site/images/contact-us/ContactUs.jpg); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                            </div>
                        </div>
                        <div class="btx-section-wrapper" style="padding-top:0px; padding-bottom:0px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-space btx-space" style="height:400px;"></div>
                                    </div>
                                </div>
                                <div class="btx-row btx-row--main btx-row--no-spacing">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-dark-scheme js-box-fitted" data-group="header-row">
                                            <div class="btx-background" data-type="color" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="background-color:#000000; opacity:0.8;"></div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                    <div class="btx-box-body" style="padding-top:80px; padding-right:8%; padding-left:8%; padding-bottom:80px;">
                                                        <div class="btx-page-hero-body">
                                                            <div class="btx-page-hero-body-title">
                                                                <h1 class="btx-page-hero-title btx-s-text-color btx-secondary-font direction-rtl" style="color:#fff">
                                                                    @lang('contact.contact_us')
                                                                </h1>
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
                    </section>
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="1">
                        <div class="btx-section-wrapper" style="padding-top:0px; padding-bottom:0px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main btx-row--no-spacing">
                                    <div class="btx-col-8">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme js-box-fitted" data-group="row-1">
                                            <div class="btx-background" data-type="color" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="background-color:#ffffff; opacity:1;"></div>
                                            </div>
                                            <div class="btx-box-inner" style="height:auto;" data-height="auto">
                                                <div class="btx-box-content btx-top-vertical" style="overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:80px; padding-right:12%; padding-left:12%; padding-bottom:80px;">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align" style="margin-bottom:20px;">
                                                            <h3 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border direction-rtl" style="letter-spacing:-0.01em;">با ما در ارتباط باشید</h3>
                                                        </div>
                                                        <div class="btx-item js-item-space btx-space" style="height:20px;"></div>
                                                        <div class="btx-item js-item-contactform btx-contactform btx-contactform--standard">
                                                            <div role="form" class="wpcf7" id="wpcf7-f1045-p1321-o1" lang="en-US" dir="ltr">
                                                                <div class="screen-reader-response"></div>
                                                                <form id="contact-form" class="direction-rtl" action="#">
                                                                    <div class="btx-row">
                                                                        <div class="btx-col-4 float-right text-right">
                                                                            <div class="btx-form-container">
                                                                                <label><span class="required">*</span>نام</label>
                                                                                <br />
                                                                                <span class="wpcf7-form-control-wrap your-name"><input name="name" id="name" type="text" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="btx-col-4 float-right text-right">
                                                                            <div class="btx-form-container">
                                                                                <label><span class="required">*</span>ایمیل</label>
                                                                                <br />
                                                                                <span class="wpcf7-form-control-wrap your-email"><input name="mail" id="mail" type="text" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="btx-col-4 float-right text-right">
                                                                            <div class="btx-form-container">
                                                                                <label>موضوع</label>
                                                                                <br />
                                                                                <span class="wpcf7-form-control-wrap your-subject"><input name="subject" id="subject" type="text" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="btx-row text-right">
                                                                        <div class="btx-col-12">
                                                                            <div class="btx-form-container">
                                                                                <label>پیام شما</label>
                                                                                <br />
                                                                                <span class="wpcf7-form-control-wrap your-message"><textarea name="comment" id="comment" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="btx-contactform-submit">
                                                                        <input type="submit" value="ارسال پیام"  id="submit_contact" class="wpcf7-form-control wpcf7-submit" />
                                                                        <div id="msg" class="message"></div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-col-4">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme js-box-fitted" data-group="row-1">
                                            <div class="btx-background" data-type="color" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="background-color:#eeeeee; opacity:1;"></div>
                                            </div>
                                            <div class="btx-box-inner" style="height:auto;" data-height="auto">
                                                <div class="btx-box-content btx-top-vertical" style="overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:80px; padding-right:24%; padding-left:24%; padding-bottom:80px;">
                                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner direction-rtl">
                                                                        <span style="color: rgb(48, 48, 48);"></span>
                                                                        {{ json_decode($setting->phone)->{0}->title }} :
                                                                        <br>
                                                                        {{ json_decode($setting->phone)->{0}->number }}
                                                                        <br><br>

                                                                        {{ json_decode($setting->fax)->{0}->title }} :
                                                                        <br>
                                                                        {{ json_decode($setting->fax)->{0}->number }}
                                                                        <br><br>

                                                                        {{ json_decode($setting->email)->{0}->title }} :
                                                                        <br>
                                                                        {{ json_decode($setting->email)->{0}->email }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align">
                                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:100%; height:1px; background-color:#cccccc;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btx-row btx-row--main btx-row--no-spacing">
                                    <div class="btx-col-8">
                                        <div class="btx-item js-item-map btx-map">
                                            <div class="map mb30">
                                                <div id="google_map" style="height:400px;"></div><!-- map container -->
                                            </div>
                                            <!-- End Map -->
                                        </div>
                                    </div>
                                    <div class="btx-col-4">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="color" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="background-color:#ffffff; opacity:1;"></div>
                                            </div>
                                            <div class="btx-box-inner" style="height:500px; line-height:500px;" data-height="500px">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:80px; padding-right:16%; padding-left:16%; padding-bottom:80px;">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align">
                                                            <h3 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border direction-rtl" style="letter-spacing:0px;">
                                                                {{ json_decode($setting->address)->{0}->title }}
                                                            </h3>
                                                        </div>
                                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner direction-rtl text-justify">
                                                                            <span class="font-style" style="font-size: 14px;">
                                                                                {{ json_decode($setting->address)->{0}->address }}
                                                                            </span>
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
                        </div>
                    </section>
                </div>
            </div>
        </article>
    </main>
@endsection