@extends('layouts.second')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection
@section('content')
    <main class="btx-content btx-content--with-header" id="main">
        <article class="btx-content-wrapper post-298 btx_portfolio type-btx_portfolio status-publish has-post-thumbnail hentry btx_portfolio_category-branding">

            <header class="btx-content-header js-dynamic-navbar btx-page-hero btx-page-hero--stacked" data-role="header">
                <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                    <div class="btx-background-overlay btx-p-bg-bg" style="opacity:0.9;"></div>
                </div>
                <div class="btx-page-hero-inner btx-container">
                    <div class="btx-page-hero-wrapper btx-center-align">
                        <div class="btx-page-hero-content btx-middle-vertical" style="padding-top:70px;">
                            <div class="btx-page-hero-content-wrapper btx-center-align" style="max-width:550px;">

                                <div class="btx-page-hero-body">

                                    <div class="btx-page-hero-body-title">
                                        <h1 class="btx-page-hero-title btx-s-text-color btx-secondary-font" style="letter-spacing:-0.01em;"><span class="font-style" style="font-size: 42px;">Bateaux Brand</span></h1>
                                    </div>

                                    <div class="btx-page-hero-subtitle btx-page-hero-subtitle--bottom btx-primary-font"><span class="font-style" style="font-size: 18px;">The company specializes in web design and development. Currently they are focusing on theme and template development.</span></div>

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
                            <div class="btx-container">
                                @php
                                    $i=1;
                                @endphp
                                @foreach($portfolios as $portfolio)
                                    @if($i%2==1)
                                        <div class="btx-row btx-row--main btx-row--no-spacing">
                                            <div class="btx-col-6">
                                                <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border js-box-fitted" data-group="box-1">
                                                    <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                        <div class="btx-background-wrapper">
                                                            <div class="btx-background-inner" style="background-image:url({{url($portfolio->default_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                        </div>
                                                        <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                                    </div>
                                                    <a href="{{url($portfolio->id.'/'.str_replace(' ','_',$portfolio->name))}}">
                                                        <div class="btx-box-inner" data-height="">
                                                            <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                                <div class="btx-box-body">

                                                                    <div class="btx-item js-item-space btx-space" style="height:300px;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="btx-col-6">
                                                <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme js-box-fitted" data-group="box-1">
                                                    <div class="btx-background" data-type="color" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                        <div class="btx-background-overlay " style="background-color:#fafafa; opacity:1;"></div>
                                                    </div>
                                                    <div class="btx-box-inner" data-height="">
                                                        <div class="btx-box-content btx-middle-vertical" style="overflow-y:auto;">
                                                            <div class="btx-box-body" style="padding-top:20%; padding-right:20%; padding-left:20%; padding-bottom:20%;">

                                                                <div class="btx-item js-item-image btx-image btx-left-align">
                                                                    <div class="btx-image-container">
                                                                        <span class="btx-icon btx-icon--with-hover btx-icon--plain btx-icon--hover-plain btx-icon--medium"><span class="btx-icon-normal btx-icon-plain btx-p-brand-color" ><i class="fa fa-et-documents"></i></span><span class="btx-icon-hover btx-icon-plain btx-s-brand-color"><i class="fa fa-et-documents"></i></span></span>
                                                                    </div>
                                                                </div>

                                                                <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-left-align btx-uppercase" style="margin-top:0px;">
                                                                    <a href="{{url($portfolio->id.'/'.str_replace(' ','_',$portfolio->name))}}"><h4 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border" style="letter-spacing:0.05em;">{{$portfolio->name}}</h4></a>
                                                                </div>

                                                                <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align" style="margin-top:30px; margin-bottom:30px;">
                                                                    <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:100%; height:1px;">
                                                                    </div>
                                                                </div>

                                                                <div class="btx-item js-item-text btx-text btx-left-align btx-primary-font" style="margin-bottom:0px;">
                                                                    <div class="btx-row" style="margin:0 -30px;">

                                                                        <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                            <div class="btx-text-content-inner">
                                                                                {!! $portfolio->description !!}
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
                                    @else
                                        <div class="btx-row btx-row--main btx-row--no-spacing">
                                            <div class="btx-col-6">
                                                <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme js-box-fitted" data-group="box-2">
                                                    <div class="btx-background" data-type="color" data-parallaxspeed="5" data-contentfade="" data-mobileparallax="">
                                                        <div class="btx-background-overlay " style="background-color:#fafafa; opacity:1;"></div>
                                                    </div>
                                                    <div class="btx-box-inner" data-height="">
                                                        <div class="btx-box-content btx-middle-vertical" style="overflow-y:auto;">
                                                            <div class="btx-box-body" style="padding-top:20%; padding-right:20%; padding-left:20%; padding-bottom:20%;">

                                                                <div class="btx-item js-item-image btx-image btx-left-align">
                                                                    <div class="btx-image-container">
                                                                        <span class="btx-icon btx-icon--with-hover btx-icon--plain btx-icon--hover-plain btx-icon--medium"><span class="btx-icon-normal btx-icon-plain btx-p-brand-color" ><i class="fa fa-et-layers"></i></span><span class="btx-icon-hover btx-icon-plain btx-s-brand-color"><i class="fa fa-et-layers"></i></span></span>
                                                                    </div>
                                                                </div>

                                                                <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-left-align btx-uppercase" style="margin-bottom:15px;">
                                                                    <a href="{{url($portfolio->id.'/'.str_replace(' ','_',$portfolio->name))}}"><h4 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border" style="letter-spacing:0.05em;">{{$portfolio->name}}</h4></a>
                                                                </div>

                                                                <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align" style="margin-top:30px; margin-bottom:30px;">
                                                                    <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:100%; height:1px;">
                                                                    </div>
                                                                </div>

                                                                <div class="btx-item js-item-text btx-text btx-left-align btx-primary-font" style="margin-bottom:0px;">
                                                                    <div class="btx-row" style="margin:0 -30px;">

                                                                        <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                            <div class="btx-text-content-inner">
                                                                                {!! $portfolio->description !!}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-col-6">
                                                <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme js-box-fitted" data-group="box-2">
                                                    <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                        <div class="btx-background-wrapper">
                                                            <div class="btx-background-inner" style="background-image:url({{url($portfolio->default_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                        </div>
                                                    </div>
                                                    <a href="{{url('portfolio/'.$portfolio->id.'/'.str_replace(' ','_',$portfolio->name))}}">
                                                        <div class="btx-box-inner" data-height="">
                                                            <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                                <div class="btx-box-body">

                                                                    <div class="btx-item js-item-space btx-space" style="height:300px;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                    @endif
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </article>
    </main>
@endsection