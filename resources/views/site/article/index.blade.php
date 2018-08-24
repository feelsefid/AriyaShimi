@extends('layouts.second')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection

@section('content')
    <main class="btx-content btx-content--with-header" id="main">
        <article id="post-90" class="btx-content-wrapper post-90 page type-page status-publish hentry">

            <header class="btx-content-header js-dynamic-navbar btx-page-hero btx-page-hero--stacked btx-dark-scheme" style="height:60vh;" data-role="header" data-scheme="dark">
                <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                    <div class="btx-background-wrapper">
                        <div class="btx-background-inner" style="background-image:url({{ url($data->image) }}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                    </div>
                    <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#1d1d1d; opacity:0.6;"></div>
                </div>
                <div class="btx-page-hero-inner btx-container">
                    <div class="btx-page-hero-wrapper btx-center-align">
                        <div class="btx-page-hero-content btx-middle-vertical">
                            <div class="btx-page-hero-content-wrapper btx-center-align" style="max-width:550px;">
                                <div class="btx-page-hero-body">
                                    <div class="btx-page-hero-body-title">
                                        <h1 class="btx-page-hero-title btx-s-text-color btx-secondary-font direction-rtl">{{ $data->name }}</h1>
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
                        <div class="btx-section-wrapper" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:20px;">
                            <div class="btx-container--fullwidth">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-blog btx-blog btx-blog--masonry btx-right-align btx-with-spacing">
                                            <div class="btx-blog-content" style="margin:0 -10px;">
                                                <article class="float-right btx-entry btx-entry--standard btx-col-1-5 btx-entry-light-scheme post-31 post type-post status-publish format-standard has-post-thumbnail hentry category-inspiration category-travel tag-life tag-ocean tag-wave" style="margin-bottom:20px; padding:0 10px;" data-filter="Inspiration, Travel">
                                                    <div class="btx-entry-inner anmt-item anmt-fadein btx-with-shadow" style="background-color:rgba(255,255,255,0.9);">
                                                        <div class="btx-entry-header">
                                                            <div class="btx-entry-media btx-s-text-color">
                                                                <a class="anmt-image-rotate" href="#"><img src="upload/blog-drown-1280x853.jpg" alt="" width="1280" height="853"  /></a>
                                                            </div>
                                                        </div>
                                                        <div class="btx-entry-body text-right" style="padding:40px;">
                                                            <h4 class="btx-entry-title btx-s-text-color btx-secondary-font">
                                                                <a href="single-article.html">بتن چیست؟</a>
                                                            </h4>
                                                            <div class="btx-entry-meta btx-s-text-color btx-s-text-color btx-primary-font">
                                                                <span class="btx-entry-date direction-rtl">۱۳۹۶/۲/۲</span>
                                                            </div>
                                                            <div class="btx-entry-excerpt text-justify direction-rtl" style="font-size: 13px; line-height: 23px">یکی از مهمترین و متداولترین مصالح ساختمانی «بتن» (Concrete) است که به علت دارا بودن خواصی از جمله شکل خمیری قبل از گیرش، مقاومت خوب در برابر آتش سوزی، دسترسی آسان به مصالح و مقاومت فشاری خوب آن استفاده از آن را با مقبولیت عمومی روبرو کرده است.</div>
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