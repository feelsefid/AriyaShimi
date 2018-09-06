@extends('layouts.second')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection
@section('content')
    <div class="btx-page-load btx-p-bg-bg">
        <div class="btx-page-load-spinner">
            <div class="btx-loading btx-loading--double-bounce">
                <div class="btx-bounce btx-p-brand-bg btx-bounce--1"></div>
                <div class="btx-bounce btx-p-brand-bg btx-bounce--2"></div>
            </div>
        </div>
    </div>
    <main class="btx-content btx-content--with-header" id="main">
        <article class="btx-content-wrapper post-298 btx_portfolio type-btx_portfolio status-publish has-post-thumbnail hentry btx_portfolio_category-branding">

            <header class="btx-content-header js-dynamic-navbar btx-page-hero btx-page-hero--stacked" data-role="header">
                <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                    <div class="btx-background-overlay btx-p-bg-bg" style="opacity:0.9;"></div>
                </div>
                <div class="btx-page-hero-inner btx-container ">
                    <div class="btx-page-hero-wrapper btx-center-align">
                        <div class="btx-page-hero-content btx-middle-vertical" style="padding-top:70px;">
                            <div class="btx-page-hero-content-wrapper btx-center-align" style="max-width:550px;">

                                <div class="btx-page-hero-body">

                                    <div class="btx-page-hero-body-title">
                                        <h1 class="btx-page-hero-title btx-s-text-color btx-secondary-font" style="letter-spacing:-0.01em;">
                                            <span class="font-style" style="font-size: 42px;">
                                                {{$title}}
                                            </span></h1>
                                    </div>

{{----}}
                                    {{--<div class="btx-page-hero-subtitle btx-page-hero-subtitle--bottom btx-primary-font"><span class="font-style" style="font-size: 18px;">The company specializes in web design and development. Currently they are focusing on theme and template development.</span></div>--}}
{{----}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="btx-main btx-main--single">
                <div class="btx-main-wrapper">
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="0">
                        <div class="btx-section-wrapper" style="padding-top:0px; padding-bottom:0px;">
                            <div class="btx-container justaPackage">
                                @include('site.portfolio.items')
                            </div>
                            <button data-page="1" data-cat="{{ @$category_id }}" class="shoMoreBtn" style="margin: 20px auto;display: block;direction: rtl;">
                                بیشتر...
                            </button>
                        </div>
                    </section>
                </div>
            </div>

        </article>
    </main>
@endsection