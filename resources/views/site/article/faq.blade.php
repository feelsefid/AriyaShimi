@extends('layouts.second')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection

@section('content')
    <main class="btx-content btx-content--with-header" id="main">
        <article id="post-1270" class="btx-content-wrapper post-1270 page type-page status-publish hentry" >
            <header class="btx-content-header js-dynamic-navbar btx-page-hero btx-page-hero--stacked btx-dark-scheme" style="height:60vh;" data-role="header" data-scheme="dark">
                <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                    <div class="btx-background-wrapper">
                        <div class="btx-background-inner" style="background-image:url({{ url($data->image) }}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                    </div>
                    <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#1d1d1d; opacity:0.2;"></div>
                </div>
                <div class="btx-page-hero-inner btx-container">
                    <div class="btx-page-hero-wrapper btx-center-align">
                        <div class="btx-page-hero-content btx-middle-vertical" >
                            <div class="btx-page-hero-content-wrapper btx-center-align" style="max-width:550px;">
                                <div class="btx-page-hero-body">
                                    <div class="btx-page-hero-body-title">
                                        <h1 class="btx-page-hero-title btx-s-text-color btx-secondary-font direction-rtl" style="color:#fff">{{ $data->name }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="btx-main btx-main--single">
                <div class="btx-main-wrapper">
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" style="border-bottom-width:1px; border-bottom-style:solid;" data-index="0">
                        <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#ffffff; opacity:1;"></div>
                        </div>
                        <div class="btx-section-wrapper" style="padding-top:100px; padding-bottom:100px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align btx-uppercase direction-rtl">
                                            <h4 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border">
                                                <span>پاسخ به سوالات متداول شما</span>
                                            </h4>
                                        </div>
                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align">
                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:100%; height:1px;"></div>
                                        </div>
                                        <div class="btx-item js-item-accordion btx-accordion btx-accordion--fill btx-right-align direction-rtl text-justify"  data-multiple="">
                                            <div class="btx-accordion-panel active " >
                                                <div class="btx-accordion-heading btx-s-text-color btx-p-border-border btx-s-bg-bg" style="border-width:1px; border-style:solid;">
                                                    <span class="btx-accordion-title">آیا میزان تناژ تولیدی برای پروژه ها محدودیت دارد؟ به کدام شهر های ایران ارسال دارید؟</span>
                                                    <span class="fa fa-angle-left" style="padding-left: 5px"></span>
                                                </div>
                                                <div class="btx-accordion-body" style="padding-top:30px; padding-bottom:30px;">
                                                    <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner text-justify">از نظر تناژ، محدودیتی وجود ندارد و در سابقه کاری شرکت همکاری با پروژه های نظیر آزاد راه تهران شمال با حجم تناژ بسیار بالا دیده میشود. و اینکه به تمامی شهر های ایران ارسال داریم.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-accordion-panel " >
                                                <div class="btx-accordion-heading btx-s-text-color btx-p-border-border btx-s-bg-bg" style="border-width:1px; border-style:solid;">
                                                    <span class="btx-accordion-title">موارد مصرف چسب های کاشی چییت؟ و اینکه آیا این چسب ها فقط روی سطح کاربرد دارند یا روی دیوار هم کارایی دارند؟</span>
                                                    <span class="fa fa-angle-left" style="padding-left: 5px"></span>
                                                </div>
                                                <div class="btx-accordion-body" style="padding-top:30px; padding-bottom:30px;">
                                                    <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner text-justify">موارد کاربرد چسب های کاشی شامل کاشی های جاذب، سنگ، سنگ های آنتیک، و موزائیک هستند و همچنین روی سطوح دیوار، کف، گچ، سیمان، بتن و... کاربرد دارند.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-accordion-panel " >
                                                <div class="btx-accordion-heading btx-s-text-color btx-p-border-border btx-s-bg-bg" style="border-width:1px; border-style:solid;">
                                                    <span class="btx-accordion-title">آیا محصولات زودگیر بتن باعث کاهش مقاومت بتن می شود؟</span>
                                                    <span class="fa fa-angle-left" style="padding-left: 5px"></span>
                                                </div>
                                                <div class="btx-accordion-body" style="padding-top:30px; padding-bottom:30px;">
                                                    <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner text-justify">به طور کلی و علمی هرگونه ماده زودگیری باعث کاهش مقاومت کوتاه مدت یا ۲۸ روزه بتن میشود اما در دراز مدت و در مقاومت نهایی یا ۹۰ روزه این مشکل برطرف میشود و تاثیر چندانی در مقاومت نهایی بتن ندارد.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-accordion-panel " >
                                                <div class="btx-accordion-heading btx-s-text-color btx-p-border-border btx-s-bg-bg" style="border-width:1px; border-style:solid;">
                                                    <span class="btx-accordion-title">برای آب بندی و نشت زدایی سازه های بتنی چه پیشنهادی دارید؟</span>
                                                    <span class="fa fa-angle-left" style="padding-left: 5px"></span>
                                                </div>
                                                <div class="btx-accordion-body" style="padding-top:30px; padding-bottom:30px;">
                                                    <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner text-justify">بهترین پیشنهاد ما برای آب بند سازی، محصول آب بند کریستالی هست که از دسته مواد بلور ساز با قدرت نفوذ بسیار زیاد به داخل بتن میباشد. همچنین این ماده در برابر نفوذ مواد شیمیایی مخرب نیز مقاوم است. البته که بسته به نوع خاص شرایط شما پیشنهاد های دیگری از همین دسته محصولات وجود دارد.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-accordion-panel " >
                                                <div class="btx-accordion-heading btx-s-text-color btx-p-border-border btx-s-bg-bg" style="border-width:1px; border-style:solid;">
                                                    <span class="btx-accordion-title">محصولات رنگی شما شامل چه مواردی هستند؟</span>
                                                    <span class="fa fa-angle-left" style="padding-left: 5px"></span>
                                                </div>
                                                <div class="btx-accordion-body" style="padding-top:30px; padding-bottom:30px;">
                                                    <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner text-justify">تولیدات ما شامل رنگ ها از جمله رنگ های نما، آکریلیک، استخری، روغنی و... همچنین رنگ های اپوکسی. ضد زنگ ها و روغن بتونه، روغن جلا و پاک کننده سیمان و بتن و چربی زدا ها هستند.</div>
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
                        <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#f5f5f5; opacity:1;"></div>
                        </div>
                        <div class="btx-section-wrapper" style="padding-top:100px; padding-bottom:100px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-heading btx-heading btx-heading--breakline btx-center-align" style="margin-bottom:40px;">
                                            <h3 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border direction-rtl" style="border-color:#303030; letter-spacing:-0.02em;">راه های پاسخگویی به سوالات شما</h3>
                                        </div>
                                        <div class="btx-item js-item-space btx-space" style="height:20px;"></div>
                                    </div>
                                </div>
                                <div class="btx-row btx-row--main btx-row--no-spacing">
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme" style="border-top-width:1px; border-bottom-width:1px; border-left-width:1px;">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="background-color:#ffffff; opacity:1;"></div>
                                            </div>
                                            <div class="btx-box-inner" style="height:auto;" data-height="auto">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:60px; padding-right:40px; padding-left:40px; padding-bottom:60px; min-height: 415px">
                                                        <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align" style="margin-top:30px; margin-bottom:30px;">
                                                            <div class="btx-feature-content">
                                                                <div class="btx-row" style="margin:0 -15px;">
                                                                    <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 15px;">
                                                                        <div class="btx-feature-media ">
                                                                                <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--x-large">
                                                                                    <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" style="color:##094D9C;">
                                                                                        <i class="fa fa-envelope" style="font-size: 35px"></i>
                                                                                    </span>
                                                                                </span>
                                                                        </div>
                                                                        <div class="btx-feature-body">
                                                                            <div class="btx-feature-title btx-s-text-color btx-secondary-font" style="letter-spacing:-0.01em;">ایمیل</div>
                                                                            <div class="btx-feature-description direction-rtl">
                                                                                <span style="color: rgb(137, 137, 137);">برای ارسال نظرات و دیدگاه های خود و همچنین دریافت پاسخ از طریق کارشناسان فروش می توانید به آدرس info@aryashimi.com ایمیل بزنید. </span>
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
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme" style="border-top-width:1px; border-bottom-width:1px; border-left-width:1px; border-right-width:1px;">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="background-color:#ffffff; opacity:1;"></div>
                                            </div>
                                            <div class="btx-box-inner" style="height:auto;" data-height="auto">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:60px; padding-right:40px; padding-left:40px; padding-bottom:60px; min-height: 415px">
                                                        <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align" style="margin-top:30px; margin-bottom:30px;">
                                                            <div class="btx-feature-content">
                                                                <div class="btx-row" style="margin:0 -15px;">
                                                                    <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 15px;">
                                                                        <div class="btx-feature-media ">
                                                                                <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--x-large">
                                                                                    <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" style="color:##094D9C;">
                                                                                        <i class="fa fa-instagram" style="font-size: 35px"></i>
                                                                                    </span>
                                                                                </span>
                                                                        </div>
                                                                        <div class="btx-feature-body">
                                                                            <div class="btx-feature-title btx-s-text-color btx-secondary-font" style="letter-spacing:-0.01em;">
                                                                                <span class="font-style" style="font-size: 18px;">اینستاگرام</span>
                                                                            </div>
                                                                            <div class="btx-feature-description direction-rtl">
                                                                                <span style="color: rgb(137, 137, 137);">برای اطلاع از آخرین اخبار و رویدادها در حوزه صنایع شیمیایی ساختمان و همچنین آشنایی با محصولات آریاشیمی، کاربردها و روش استفاده آن ها، به اینستاگرام ما به نشانی aryashimico@ سر بزنید. </span>
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
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme" style="border-top-width:1px; border-bottom-width:1px; border-right-width:1px;">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="background-color:#ffffff; opacity:1;"></div>
                                            </div>
                                            <div class="btx-box-inner" style="height:auto;" data-height="auto">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:60px; padding-right:40px; padding-left:40px; padding-bottom:60px; min-height: 415px">
                                                        <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align" style="margin-top:30px; margin-bottom:30px;">
                                                            <div class="btx-feature-content">
                                                                <div class="btx-row" style="margin:0 -15px;">
                                                                    <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 15px;">
                                                                        <div class="btx-feature-media ">
                                                                                <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--x-large">
                                                                                    <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" style="color:##094D9C;">
                                                                                        <i class="fa fa-phone" style="font-size: 35px"></i>
                                                                                    </span>
                                                                                </span>
                                                                        </div>
                                                                        <div class="btx-feature-body">
                                                                            <div class="btx-feature-title btx-s-text-color btx-secondary-font" style="letter-spacing:-0.01em;">
                                                                                    <span class="font-style" style="font-size: 18px;">
                                                                                        <span style="color: rgb(34, 34, 34);">تماس تلفنی</span>
                                                                                    </span>
                                                                            </div>
                                                                            <div class="btx-feature-description direction-rtl">
                                                                                    <span style="color: rgb(137, 137, 137);">شماره تماس های زیر هر روزه پاسخگوی نظرات، سوالات، انتقادات و پیشنهادات و سفارشات شما هستند.
                                                                                        <br>
                                                                                        ۰۲۱-۴۴۸۹۴۹۰۰-۱۰
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
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </article>
    </main>
@endsection