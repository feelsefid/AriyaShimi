@extends('layouts.second')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection

@section('content')
    <main class="btx-content btx-content--with-header" id="main">
    <article id="post-200" class="btx-content-wrapper post-200 page type-page status-publish hentry">
        <header class="btx-content-header js-dynamic-navbar btx-page-hero btx-page-hero--stacked" style="height:60vh;" data-role="header">
            <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                <div class="btx-background-wrapper">
                    <div class="btx-background-inner" style="background-image:url({{ url('/') }}/site/images/news/NewsBackground.jpg); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                </div>
                <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#1d1d1d; opacity:0.6;"></div>
            </div>
            <div class="btx-page-hero-inner btx-container">
                <div class="btx-page-hero-wrapper btx-center-align">
                    <div class="btx-page-hero-content btx-middle-vertical">
                        <div class="btx-page-hero-content-wrapper btx-center-align" style="max-width:550px;">
                            <div class="btx-page-hero-body">
                                <div class="btx-page-hero-body-title">
                                    <h1 class="btx-page-hero-title btx-s-text-color btx-secondary-font direction-rtl" style="color:#fff">اخبار</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="btx-main btx-main--single">
            <div class="btx-main-wrapper">
                <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="0">
                    <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                        <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#f5f5f5; opacity:1;"></div>
                    </div>
                    <div class="btx-section-wrapper" style="padding-top:60px; padding-bottom:60px;">
                        <div class="btx-container">
                            <div class="btx-row btx-row--main">
                                <div class="btx-col-12">
                                    <div class="btx-item js-item-blog btx-blog btx-blog--timeline btx-right-align btx-with-spacing">
                                        <div class="btx-timeline-title">
                                            <div class="btx-timeline-title-text btx-p-border-border btx-s-text-color">اخبار</div>
                                        </div>
                                        <div class="btx-blog-content">
                                            <article class="btx-entry btx-entry--standard  post-141 post type-post status-publish format-standard has-post-thumbnail hentry category-travel tag-mountain tag-winter" style="margin-bottom:60px;">
                                                <div class="btx-entry-inner anmt-item anmt-fadein">
                                                    <div class="btx-entry-timeline-icon btx-p-border-bg"></div>
                                                    <div class="btx-entry-header">
                                                        <div class="btx-entry-media btx-s-text-color">
                                                            <a class="" href="#"><img src="images/news/News-01.jpg" alt="" width="1024" height="683"  /></a>
                                                        </div>
                                                    </div>
                                                    <div class="btx-entry-body direction-rtl">
                                                        <div class="btx-entry-body-inner btx-s-bg-bg " style="background-color:rgba(255,255,255,1); border-color:#ffffff; padding:40px;">
                                                            <div class="btx-entry-timeline-header btx-p-border-border btx-s-text-color btx-primary-font">
                                                                <div class="btx-entry-timeline-day float-right">۳۰</div>
                                                                <div class="btx-entry-timeline-subheader">
                                                                    <h4>خرداد</h4>
                                                                    <h4>۱۳۹۶</h4>
                                                                </div>
                                                            </div>
                                                            <h4 class="btx-entry-title btx-s-text-color btx-secondary-font">
                                                                <a href="news-01.html"><h3 class="btx-post-title">فصلنامه گواهینامه فنی از سوی مرکز تحقیقات راه، مسکن و شهرسازی منتشر شد</h3></a>
                                                            </h4>
                                                            <div class="btx-entry-excerpt text-justify">مرکز تحقیقات راه، مسکن و شهرسازی طبق اساسنامه خود و آیین نامه اجرایی ماده 14 قانون ساماندهی و حمایت از تولید و عرضه مسکن، نسبت به بررسی و ارزیابی محصولات و فرآورده های ساختمانی ...</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="btx-entry btx-entry--standard  post-139 post type-post status-publish format-standard has-post-thumbnail hentry category-design tag-design tag-life tag-style" style="margin-bottom:60px;">
                                                <div class="btx-entry-inner anmt-item anmt-fadein">
                                                    <div class="btx-entry-timeline-icon btx-p-border-bg"></div>
                                                    <div class="btx-entry-header">
                                                        <div class="btx-entry-media btx-s-text-color">
                                                            <a class="" href="#"><img src="upload/blog-paint-1024x683.jpg" alt="" width="1024" height="683"  /></a>
                                                        </div>
                                                    </div>
                                                    <div class="btx-entry-body direction-rtl">
                                                        <div class="btx-entry-body-inner btx-s-bg-bg " style="background-color:rgba(255,255,255,1); border-color:#ffffff; padding:40px;">
                                                            <div class="btx-entry-timeline-header btx-p-border-border btx-s-text-color btx-primary-font">
                                                                <div class="btx-entry-timeline-day float-right">26</div>
                                                                <div class="btx-entry-timeline-subheader">
                                                                    <h4>December</h4>
                                                                    <h4>2015</h4>
                                                                </div>
                                                            </div>
                                                            <h4 class="btx-entry-title btx-s-text-color btx-secondary-font">
                                                                <a href="#">The bluish shade of gray</a>
                                                            </h4>
                                                            <div class="btx-entry-excerpt text-justify">Mauris at bibendum ante. Vivamus turpis elit, rhoncus vel felis id, pulvinar sodales justo. Proin ante ex, molestie sit amet molestie in, volutpat ut nunc. Nam eu quam porta, volutpat nulla eget.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="btx-entry btx-entry--standard  post-141 post type-post status-publish format-standard has-post-thumbnail hentry category-travel tag-mountain tag-winter" style="margin-bottom:60px;">
                                                <div class="btx-entry-inner anmt-item anmt-fadein">
                                                    <div class="btx-entry-timeline-icon btx-p-border-bg"></div>
                                                    <div class="btx-entry-header">
                                                        <div class="btx-entry-media btx-s-text-color">
                                                            <a class="" href="#"><img src="upload/blog-winter-1024x683.jpg" alt="" width="1024" height="683"  /></a>
                                                        </div>
                                                    </div>
                                                    <div class="btx-entry-body direction-rtl">
                                                        <div class="btx-entry-body-inner btx-s-bg-bg " style="background-color:rgba(255,255,255,1); border-color:#ffffff; padding:40px;">
                                                            <div class="btx-entry-timeline-header btx-p-border-border btx-s-text-color btx-primary-font">
                                                                <div class="btx-entry-timeline-day float-right">30</div>
                                                                <div class="btx-entry-timeline-subheader">
                                                                    <h4>December</h4>
                                                                    <h4>2015</h4>
                                                                </div>
                                                            </div>
                                                            <h4 class="btx-entry-title btx-s-text-color btx-secondary-font">
                                                                <a href="#">Hey folks, it&#8217;s winter</a>
                                                            </h4>
                                                            <div class="btx-entry-excerpt text-justify">Sed ac nisi nec dui lacinia ornare. Phasellus sed mattis lorem. Praesent metus sem, gravida sit amet ornare a, rhoncus sit amet mi. Nam ac nisi elit. Vivamus congue sollicitudin mollis.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="btx-entry btx-entry--standard  post-139 post type-post status-publish format-standard has-post-thumbnail hentry category-design tag-design tag-life tag-style" style="margin-bottom:60px;">
                                                <div class="btx-entry-inner anmt-item anmt-fadein">
                                                    <div class="btx-entry-timeline-icon btx-p-border-bg"></div>
                                                    <div class="btx-entry-header">
                                                        <div class="btx-entry-media btx-s-text-color">
                                                            <a class="" href="#"><img src="upload/blog-paint-1024x683.jpg" alt="" width="1024" height="683"  /></a>
                                                        </div>
                                                    </div>
                                                    <div class="btx-entry-body direction-rtl">
                                                        <div class="btx-entry-body-inner btx-s-bg-bg " style="background-color:rgba(255,255,255,1); border-color:#ffffff; padding:40px;">
                                                            <div class="btx-entry-timeline-header btx-p-border-border btx-s-text-color btx-primary-font">
                                                                <div class="btx-entry-timeline-day float-right">26</div>
                                                                <div class="btx-entry-timeline-subheader">
                                                                    <h4>December</h4>
                                                                    <h4>2015</h4>
                                                                </div>
                                                            </div>

                                                            <h4 class="btx-entry-title btx-s-text-color btx-secondary-font">
                                                                <a href="#">The bluish shade of gray</a>
                                                            </h4>

                                                            <div class="btx-entry-excerpt text-justify">Mauris at bibendum ante. Vivamus turpis elit, rhoncus vel felis id, pulvinar sodales justo. Proin ante ex, molestie sit amet molestie in, volutpat ut nunc. Nam eu quam porta, volutpat nulla eget.</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="btx-entry btx-entry--standard  post-141 post type-post status-publish format-standard has-post-thumbnail hentry category-travel tag-mountain tag-winter" style="margin-bottom:60px;">
                                                <div class="btx-entry-inner anmt-item anmt-fadein">
                                                    <div class="btx-entry-timeline-icon btx-p-border-bg"></div>
                                                    <div class="btx-entry-header">
                                                        <div class="btx-entry-media btx-s-text-color">
                                                            <a class="" href="#"><img src="upload/blog-winter-1024x683.jpg" alt="" width="1024" height="683"  /></a>
                                                        </div>
                                                    </div>
                                                    <div class="btx-entry-body direction-rtl">
                                                        <div class="btx-entry-body-inner btx-s-bg-bg " style="background-color:rgba(255,255,255,1); border-color:#ffffff; padding:40px;">
                                                            <div class="btx-entry-timeline-header btx-p-border-border btx-s-text-color btx-primary-font">
                                                                <div class="btx-entry-timeline-day float-right">30</div>
                                                                <div class="btx-entry-timeline-subheader">
                                                                    <h4>December</h4>
                                                                    <h4>2015</h4>
                                                                </div>
                                                            </div>
                                                            <h4 class="btx-entry-title btx-s-text-color btx-secondary-font">
                                                                <a href="#">Hey folks, it&#8217;s winter</a>
                                                            </h4>
                                                            <div class="btx-entry-excerpt text-justify">Sed ac nisi nec dui lacinia ornare. Phasellus sed mattis lorem. Praesent metus sem, gravida sit amet ornare a, rhoncus sit amet mi. Nam ac nisi elit. Vivamus congue sollicitudin mollis.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="btx-entry btx-entry--standard  post-139 post type-post status-publish format-standard has-post-thumbnail hentry category-design tag-design tag-life tag-style" style="margin-bottom:60px;">
                                                <div class="btx-entry-inner anmt-item anmt-fadein">
                                                    <div class="btx-entry-timeline-icon btx-p-border-bg"></div>
                                                    <div class="btx-entry-header">
                                                        <div class="btx-entry-media btx-s-text-color">
                                                            <a class="" href="#"><img src="upload/blog-paint-1024x683.jpg" alt="" width="1024" height="683"  /></a>
                                                        </div>
                                                    </div>
                                                    <div class="btx-entry-body direction-rtl">
                                                        <div class="btx-entry-body-inner btx-s-bg-bg " style="background-color:rgba(255,255,255,1); border-color:#ffffff; padding:40px;">
                                                            <div class="btx-entry-timeline-header btx-p-border-border btx-s-text-color btx-primary-font">
                                                                <div class="btx-entry-timeline-day float-right">26</div>
                                                                <div class="btx-entry-timeline-subheader">
                                                                    <h4>December</h4>
                                                                    <h4>2015</h4>
                                                                </div>
                                                            </div>

                                                            <h4 class="btx-entry-title btx-s-text-color btx-secondary-font">
                                                                <a href="#">The bluish shade of gray</a>
                                                            </h4>

                                                            <div class="btx-entry-excerpt text-justify">Mauris at bibendum ante. Vivamus turpis elit, rhoncus vel felis id, pulvinar sodales justo. Proin ante ex, molestie sit amet molestie in, volutpat ut nunc. Nam eu quam porta, volutpat nulla eget.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
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