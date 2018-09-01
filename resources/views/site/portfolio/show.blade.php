@extends('layouts.second')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection
@section('content')
<article id="post-135" class="post-135 btx-content-wrapper post type-post status-publish format-standard has-post-thumbnail hentry category-lifestyle category-travel tag-ocean tag-sail tag-trip">
                <div class="btx-post btx-post--magazine btx-post--no-sidebar btx-post-format--standard btx-post-featured--overlap">
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" id="package-design"  data-index="11">
                        <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#ffffff; opacity:1;"></div>
                        </div>
                        <div class="btx-section-wrapper" style="padding-top:70px; padding-bottom:70px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-1"></div>
                                    <div class="btx-col-10">
                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-center-align btx-uppercase" >
                                            <h3 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border">
                                                <span class="font-style" style="font-size: 16px;">{{ $portfolio->name }}</span>
                                            </h3>
                                        </div>
                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align" >
                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:120px; height:1px; background-color:#094D9C;"></div>
                                        </div>
                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                            <div class="btx-row" style="margin:0 -30px;">
                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                    <div class="btx-text-content-inner">
                                                        <span class="font-style direction-rtl" style="font-size: 13px;">
                                                            {!! $portfolio->description !!}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btx-item js-item-image btx-image btx-center-align" >
                                            <div class="btx-image-container">
                                                <img src="{{ url($portfolio->default_image) }}" alt="{{ $portfolio->name }}"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-col-1"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="btx-section js-dynamic-navbar btx-p-border-border direction-rtl" data-index="1">
                        <div class="btx-section-wrapper" style="padding-top:0px; padding-bottom:0px;">
                            <div class="btx-container--fullwidth">
                                <div class="btx-row btx-row--main btx-row--no-spacing">
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-interactive btx-interactive btx-interactive--overlay btx-p-border-border btx-interactive--overlay-fadein" style="height:300px; line-height:300px;">
                                            <div class="btx-interactive-space btx-interactive-space--normal btx-dark-scheme">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->standard_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color:#FDB813; opacity:0.6;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align btx-feature--separator" style="margin-top:30px; margin-bottom:30px;">
                                                        <div class="btx-feature-content">
                                                            <div class="btx-row" style="margin:0 0px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 0px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--medium">
                                                                            <img src="/files/images/product/icon/standard.png">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-interactive-space btx-interactive-space--hover btx-dark-scheme">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->standard_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color:#FDB813; opacity:0.8;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner">
                                                                    <br><span style="color: rgb(255, 255, 255);">{!! $portfolio->standard_text !!}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-interactive btx-interactive btx-interactive--overlay btx-p-border-border btx-interactive--overlay-fadein" style="height:300px; line-height:300px;">
                                            <div class="btx-interactive-space btx-interactive-space--normal btx-light-scheme">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->usages_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color:#084D9C; opacity:0.6;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align btx-feature--separator" style="margin-top:30px; margin-bottom:30px;">
                                                        <div class="btx-feature-content">
                                                            <div class="btx-row" style="margin:0 0px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 0px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--medium">
                                                                            <img src="/files/images/product/icon/mavared-karbord.png">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-interactive-space btx-interactive-space--hover btx-dark-scheme">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->standard_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color:#084D9C; opacity:0.8;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner">
                                                                    <br><span style="color: rgb(255, 255, 255);">
                                                                        {!! $portfolio->usages_text !!}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-interactive btx-interactive btx-interactive--overlay btx-p-border-border btx-interactive--overlay-fadein" style="height:300px; line-height:300px;">
                                            <div class="btx-interactive-space btx-interactive-space--normal btx-light-scheme">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->mazaya_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color:#BCBDC0; opacity:0.6;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align btx-feature--separator" style="margin-top:30px; margin-bottom:30px;">
                                                        <div class="btx-feature-content">
                                                            <div class="btx-row" style="margin:0 0px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 0px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--medium">
                                                                            <img src="/files/images/product/icon/mazayae-estefade.png">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-interactive-space btx-interactive-space--hover btx-light-scheme">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{ url($portfolio->mazaya_image) }}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color:#BCBDC0; opacity:0.8;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner">
                                                                    <br>
                                                                    <span style="color: rgb(34, 34, 34);">
                                                                        {!! $portfolio->mazaya_text !!}
                                                                    </span>
                                                                    <br>
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
                    <section class="btx-section js-dynamic-navbar btx-p-border-border"  data-index="0">
                        <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-overlay btx-p-bg-bg" style="opacity:1;"></div>
                        </div>
                        <div class="btx-section-wrapper" style="padding-top:100px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-1"></div>
                                    <div class="btx-col-10">
                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-center-align btx-uppercase" >
                                            <h3 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border">
                                                <span class="font-style" style="font-size: 16px;">مشخصات فیزیکی و شیمیایی</span>
                                            </h3>
                                        </div>
                                        <div class="btx-container">
                                            <div class="btx-row btx-row--main">
                                                <div class="btx-col-12">
                                                    <div class="btx-item js-item-table btx-table btx-table--standard btx-right-align direction-rtl table-responsive">
                                                        <table>
                                                            <thead class="btx-p-brand-contrast-color btx-p-brand-bg">
                                                            <tr>
                                                                <th>ویژگی ها</th>
                                                                <th>توضیحات</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="btx-p-brand-border">
                                                            @foreach($vizhegies as $key => $value)
                                                            <tr class="btx-table-body-row ">
                                                                <td style="width:40%;"><span style="color: rgb(48, 48, 48);">{{$key}}</span></td>
                                                                <td style="width:30%;">{{$value}}</td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btx-item js-item-space btx-space" style="height:20px;"></div>
                                    </div>
                                    <div class="btx-col-1"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="btx-section js-dynamic-navbar btx-p-border-border direction-rtl" style="border-bottom-width:1px; border-bottom-style:solid;" data-index="2">
                        <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#f5f5f5; opacity:0.5;"></div>
                        </div>
                        <div class="btx-section-wrapper">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-6 float-right">
                                        <div class="btx-item js-item-interactive btx-interactive btx-interactive--flip btx-p-border-border" style="border-width:1px; border-color:#eeeeee; height:400px; line-height:400px;">
                                            <div class="btx-interactive-space btx-interactive-space--normal btx-light-scheme">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->masraf_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color: #000000; opacity:0.6;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:60px; padding-right:60px; padding-left:60px; padding-bottom:60px;">
                                                    <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-center-align">
                                                        <img src="/files/images/product/icon/mizan-masraf.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-interactive-space btx-interactive-space--hover btx-dark-scheme">
                                                <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-overlay " style="background-color:#094D9C; opacity:0.9;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:60px; padding-right:60px; padding-left:60px; padding-bottom:60px;">
                                                    <div class="btx-item js-item-skill btx-skill btx-skill--bar btx-skill--horizontal">
                                                        <div class="btx-row">
                                                            <div class="btx-skill-item btx-col-12" data-percent="88" data-axis="horizontal">
                                                                <div class="btx-skill-heading text-justify">
                                                                    <span class="btx-s-text-color">
                                                                        {!! $portfolio->masraf_text !!}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-col-6 float-right">
                                        <div class="btx-item js-item-interactive btx-interactive btx-interactive--flip btx-p-border-border" style="border-width:1px; border-color:#eeeeee; height:400px; line-height:400px;">
                                            <div class="btx-interactive-space btx-interactive-space--normal btx-light-scheme">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->amadesazi_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color: #000000; opacity:0.6;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:60px; padding-right:60px; padding-left:60px; padding-bottom:60px;">
                                                    <div class="btx-interactive-content" style="padding-top:60px; padding-right:60px; padding-left:60px; padding-bottom:60px;">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-center-align">
                                                            <img src="/files/images/product/icon/amadesazi-sath.png">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-interactive-space btx-interactive-space--hover btx-dark-scheme">
                                                <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-overlay " style="background-color:#094D9C; opacity:0.9;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:60px; padding-right:60px; padding-left:60px; padding-bottom:60px;">
                                                    <div class="btx-item js-item-skill btx-skill btx-skill--bar btx-skill--horizontal">
                                                        <div class="btx-row">
                                                            <div class="btx-skill-item btx-col-12" data-percent="88" data-axis="horizontal">
                                                                <div class="btx-skill-heading text-justify">
                                                                    <span class="btx-s-text-color">{!! $portfolio->amadesazi_text !!}</span>
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
                    <section class="btx-section js-dynamic-navbar btx-p-border-border btx-dark-scheme" data-index="4" data-scheme="dark">
                        <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-wrapper">
                                <div class="btx-background-inner" style="background-image:url({{url($portfolio->sakht_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                            </div>
                            <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#1d1d1d; opacity:0.7;"></div>
                        </div>
                        <div class="btx-section-wrapper" style="padding-top:150px; padding-bottom:150px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                            </div>
                                            <div class="btx-box-inner"  data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="max-width:900px; overflow-y:hidden;">
                                                    <div class="btx-box-body" >
                                                        <div class="btx-item js-item-quote btx-quote btx-quote--standard btx-center-align btx-with-background" >
                                                            <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align" >
                                                                <h2 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border direction-rtl" style="letter-spacing:-0.02em;">
                                                                    <span class="font-style" style="font-size: 16px;">طریقه ساخت</span>
                                                                </h2>
                                                            </div>
                                                            <div class="btx-quote-text btx-s-text-color btx-custom_c-font text-right">
                                                                <span class="font-style direction-rtl" style="font-size: 13px;">{!! $portfolio->sakht_text !!}</span>
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
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="5">
                        <div class="btx-section-wrapper" style="padding-top:0px; padding-bottom:0px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-6">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border js-box-fitted" data-group="iphone">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="opacity:0.5;"></div>
                                            </div>
                                            <div class="btx-box-inner" style="max-height: 700px"  data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                    <div class="btx-box-body" style="padding-top:30px; padding-bottom:30px;">
                                                        <div class="btx-item js-item-space btx-space" style="height:40px;"></div>
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align" >
                                                            <h2 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border direction-rtl" style="letter-spacing:-0.02em;">
                                                                <span class="font-style" style="font-size: 16px;">طریقه اجرا:</span>
                                                            </h2>
                                                        </div>
                                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner direction-rtl text-justify">
                                                                        <span class="font-style" style="font-size: 13px;">
                                                                            {!! $portfolio->ejra_text !!}
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
                                    <div class="btx-col-6">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border js-box-fitted" data-group="iphone">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                            </div>
                                            <div class="btx-box-inner"  data-height="" style="max-height: 700px">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                    <div class="btx-box-body" >
                                                        <div class="btx-item js-item-image btx-image btx-center-align anmt-item anmt-fadeinu" style="margin-right:5%; margin-left:20%;">
                                                            <div class="btx-image-container">
                                                                <img src="{{url($portfolio->ejra_image)}}" alt="" style="max-width:100%;" width="488" height="1200"  />
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
                    <section class="btx-section js-dynamic-navbar btx-p-border-border direction-rtl" data-index="4">
                        <div class="btx-section-wrapper" style="padding-top:0px; padding-bottom:0px;">
                            <div class="btx-container--fullwidth">
                                <div class="btx-row btx-row--main btx-row--no-spacing">
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-interactive btx-interactive btx-interactive--slide btx-p-border-border btx-interactive--slide-left">
                                            <div class="btx-interactive-space btx-interactive-space--normal btx-light-scheme" style="min-height: 250px">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->negahdari_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color: #000000; opacity:0.6;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align btx-feature--separator" style="margin-top:30px; margin-bottom:30px;">
                                                        <div class="btx-feature-content">
                                                            <div class="btx-row" style="margin:0 0px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 0px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--medium">
                                                                            <img src="/files/images/product/icon/sharayet-negahdari.png">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-interactive-space btx-interactive-space--hover btx-dark-scheme" style="min-height: 200px">
                                                <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-overlay " style="background-color:#FDB813; opacity:0.9;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner">
                                                                    <br><span style="color: #fff;">{!! $portfolio->negahdari_text !!}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-interactive btx-interactive btx-interactive--slide btx-p-border-border btx-interactive--slide-left">
                                            <div class="btx-interactive-space btx-interactive-space--normal btx-light-scheme" style="min-height: 250px">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->time_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color: #000000; opacity:0.6;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align btx-feature--separator" style="margin-top:30px; margin-bottom:30px;">
                                                        <div class="btx-feature-content">
                                                            <div class="btx-row" style="margin:0 0px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 0px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--medium">
                                                                            <img src="/files/images/product/icon/modat-negahdari.png">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-interactive-space btx-interactive-space--hover btx-dark-scheme" style="min-height: 200px">
                                                <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-overlay " style="background-color:#084D9C; opacity:0.9;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner">
                                                                    <br><span style="color: #fff;">
                                                                        {!! $portfolio->time_text !!}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-col-4 float-right">
                                        <div class="btx-item js-item-interactive btx-interactive btx-interactive--slide btx-p-border-border btx-interactive--slide-left">
                                            <div class="btx-interactive-space btx-interactive-space--normal btx-light-scheme" style="min-height: 250px">
                                                <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-wrapper">
                                                        <div class="btx-background-inner" style="background-image:url({{url($portfolio->imeni_image)}}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                    </div>
                                                    <div class="btx-background-overlay " style="background-color: #000000; opacity:0.6;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align btx-feature--separator" style="margin-top:30px; margin-bottom:30px;">
                                                        <div class="btx-feature-content">
                                                            <div class="btx-row" style="margin:0 0px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 0px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--without-hover btx-icon--plain btx-icon--medium">
                                                                            <img src="/files/images/product/icon/nokat.png">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btx-interactive-space btx-interactive-space--hover btx-dark-scheme" style="min-height: 200px">
                                                <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                    <div class="btx-background-overlay " style="background-color:#BCBDC0; opacity:0.9;"></div>
                                                </div>
                                                <div class="btx-interactive-content" style="padding-top:40px; padding-right:40px; padding-left:40px; padding-bottom:40px;">
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner">
                                                                    <br><span style="color: #fff;">{!! $portfolio->imeni_text !!}</span>
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
                    <div class="btx-container js-dynamic-navbar" style="padding: 50px 0px;">
                        <div class="btx-main btx-main--single">
                            <div class="btx-main-wrapper">
                                <!--Content Part-->
                                <div class="btx-post-content">
                                    <div class="btx-text-content direction-rtl text-right">
                                        <div class="btx-container">
                                            <div class="btx-row btx-row--main">
                                                <div class="btx-col-1"></div>
                                                <div class="btx-col-12">
                                                    <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-center-align btx-uppercase" >
                                                        <h3 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border">
                                                            <span class="font-style" style="font-size: 18px;">خدمات فنی آریا شیمی</span>
                                                        </h3>
                                                    </div>
                                                    <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align" style="margin-top:30px;">
                                                        <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:200px; height:1px; background-color:#cccccc;"></div>
                                                    </div>
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <span style="font-size: 13px;">{!! $portfolio->fanni_text !!}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btx-col-1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
@endsection
