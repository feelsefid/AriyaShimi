@extends('layouts.second')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection

@section('content')
    <article id="post-1960" class="btx-content-wrapper post-1960 page type-page status-publish has-post-thumbnail hentry" >
        <div class="btx-main btx-main--single">
            <div class="btx-main-wrapper">
                <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="1">
                    <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                        <div class="btx-background-overlay btx-p-bg-bg" style="opacity:0.9;"></div>
                    </div>
                    <div class="btx-section-wrapper" style="padding-top:10px; padding-bottom: 0px">
                        <div class="btx-container--fullwidth">
                            <div class="btx-row btx-row--main">
                                <div class="btx-col-12">
                                    <div class="btx-item js-item-image btx-image btx-center-align anmt-item anmt-fadeinu fullwidth-image">
                                        <div class="btx-image-container">
                                            <img src="{{ url($data->image) }}" alt="" style="max-width:1920px;" width="1200" height="487" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="0">
                    <div class="btx-section-wrapper" style="padding-top:100px; padding-bottom:60px;">
                        <div class="btx-container">
                            <div class="btx-row btx-row--main">
                                <div class="btx-col-12">
                                    <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-center-align">
                                        <h1 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border">
                                            <span class="font-style font-style-big direction-rtl" style="font-size: 16px;">{{ $data->articles[0]->name }}</span>
                                        </h1>
                                    </div>
                                    <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align" >
                                        <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:120px; height:1px; background-color:#094D9C;"></div>
                                    </div>
                                    <div class="btx-item js-item-space btx-space" style="height:5px;"></div>
                                    <div class="btx-item js-item-box btx-box btx-center-align hide-border btx-p-border-border">
                                        <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                            <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                        </div>
                                        <div class="btx-box-inner"  data-height="">
                                            <div class="btx-box-content btx-middle-vertical" style="max-width:900px; overflow-y:hidden;">
                                                <div class="btx-box-body" >
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner text-justify direction-rtl">
                                                                    <span class="font-style" style="font-size: 13px;">
                                                                        {!! $data->articles[0]->text !!}
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

                <section class="btx-section js-dynamic-navbar btx-p-border-border" id="section-1" style="border-bottom-width:1px; border-bottom-style:solid;" data-index="2">
                    <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                        <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#f5f5f5; opacity:1;"></div>
                    </div>
                    <div class="btx-section-wrapper" style="padding-top:70px; padding-bottom:20px;">
                        <div class="btx-container">
                            <div class="btx-row btx-row--main">
                                <div class="btx-col-12">
                                    <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-center-align" >
                                        <h2 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border">
                                            <span class="font-style direction-rtl" style="font-size: 16px;">{{ $data->articles[1]->name }}</span>
                                        </h2>
                                    </div>
                                    <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align" >
                                        <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:120px; height:1px; background-color:#094D9C;"></div>
                                    </div>
                                    <div class="btx-item js-item-space btx-space" style="height:5px;"></div>
                                    <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border">
                                        <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                            <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                        </div>
                                        <div class="btx-box-inner"  data-height="">
                                            <div class="btx-box-content btx-middle-vertical" style="max-width:900px; overflow-y:hidden;">
                                                <div class="btx-box-body" >
                                                    <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner direction-rtl">
                                                                    <span class="font-style" style="font-size: 13px;">
                                                                        {!! $data->articles[1]->text !!}
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
                            <div class="btx-row btx-row--main">
                                <div class="btx-col-3">
                                    <div class="btx-item js-item-box btx-box btx-right-align btx-center-align-responsive btx-p-border-border js-box-fitted" data-group="iphone">
                                        <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                            <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                        </div>
                                        <div class="btx-box-inner"  data-height="">
                                            <div class="btx-box-content btx-middle-vertical" style="max-width:280px; overflow-y:hidden;">
                                                <div class="btx-box-body" style="padding-top:20px; padding-bottom:20px;">
                                                    <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align btx-center-align-responsive">
                                                        <div class="btx-feature-content">
                                                            <div class="btx-row" style="margin:0 -20px 40px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 20px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--plain btx-icon--hover-plain btx-icon--medium">
                                                                            <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" >
                                                                                <img src="{{ url(explode(',', $data->articles[1]->image)[1]) }}" alt="" width="100" height="100" />
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="btx-feature-body">
                                                                        <div class="btx-feature-title btx-s-text-color btx-primary-font direction-rtl">انجمن مدیران کنترل کیفیت صنایع</div>
                                                                        <!--<div class="btx-feature-description direction-rtl">Suspendisse dignissim hendrerit turpis, in interdum tortor fermentum.</div>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btx-row" style="margin:0 -20px 40px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 20px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--plain btx-icon--hover-plain btx-icon--medium">
                                                                            <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" >
                                                                                <img src="{{ url(explode(',', $data->articles[1]->image)[2]) }}" alt="" width="100" height="100" />
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="btx-feature-body">
                                                                        <div class="btx-feature-title btx-s-text-color btx-primary-font direction-rtl">انجمن دارندگان نشان استاندارد ایران</div>
                                                                        <!--<div class="btx-feature-description direction-rtl">Suspendisse dignissim hendrerit turpis, in interdum tortor fermentum.</div>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btx-row" style="margin:0 -20px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 20px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--plain btx-icon--hover-plain btx-icon--medium">
                                                                            <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" >
                                                                                <img src="{{ url(explode(',', $data->articles[1]->image)[3]) }}" alt="" width="100" height="100" />
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="btx-feature-body">
                                                                        <div class="btx-feature-title btx-s-text-color btx-primary-font direction-rtl">نشان ISO 9001</div>
                                                                        <!--<div class="btx-feature-description direction-rtl">Suspendisse dignissim hendrerit turpis, in interdum tortor fermentum.</div>-->
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
                                <div class="btx-col-6">
                                    <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border js-box-fitted" data-group="iphone">
                                        <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                            <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                        </div>
                                        <div class="btx-box-inner"  data-height="">
                                            <div class="btx-box-content btx-middle-vertical" style="max-width:450px; overflow-y:hidden;">
                                                <div class="btx-box-body" >
                                                    <div class="btx-item js-item-gallery btx-gallery btx-gallery--carousel" >
                                                        <div class="btx-gallery-content" style="margin:0 -7.5px;" data-display="1" data-scroll="1" data-duration="4000" data-fade="true" data-arrows="false" data-loop="true">
                                                            <div class="btx-gallery-item  btx-col-12" style="padding:0 7.5px;">
                                                                <div class="btx-gallery-body " >
                                                                    <div class="btx-gallery-media ">
                                                                        <img src="{{ url(explode(',', $data->articles[1]->image)[0]) }}" alt=""  width="600" height="1148"  />
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
                                <div class="btx-col-3">
                                    <div class="btx-item js-item-box btx-box btx-left-align btx-center-align-responsive btx-p-border-border js-box-fitted" data-group="iphone">
                                        <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                            <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                        </div>
                                        <div class="btx-box-inner"  data-height="">
                                            <div class="btx-box-content btx-middle-vertical" style="max-width:280px; overflow-y:hidden;">
                                                <div class="btx-box-body" style="padding-top:20px; padding-bottom:20px;">
                                                    <div class="btx-item js-item-feature btx-feature btx-feature--top btx-center-align btx-center-align-responsive">
                                                        <div class="btx-feature-content">
                                                            <div class="btx-row" style="margin:0 -20px 40px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 20px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--plain btx-icon--hover-plain btx-icon--medium">
                                                                            <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" >
                                                                                <img src="{{ url(explode(',', $data->articles[1]->image)[4]) }}" alt="" width="100" height="100" />
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="btx-feature-body">
                                                                        <div class="btx-feature-title btx-s-text-color btx-primary-font direction-rtl">استاندارد ایران</div>
                                                                        <!--<div class="btx-feature-description direction-rtl">Suspendisse dignissim hendrerit turpis, in interdum tortor fermentum.</div>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btx-row" style="margin:0 -20px 40px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 20px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--plain btx-icon--hover-plain btx-icon--medium">
                                                                            <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" >
                                                                                <img src="{{ url(explode(',', $data->articles[1]->image)[5]) }}" alt="" width="100" height="100" />
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="btx-feature-body">
                                                                        <div class="btx-feature-title btx-s-text-color btx-primary-font direction-rtl">انجمن بتن ایران</div>
                                                                        <!--<div class="btx-feature-description direction-rtl">Suspendisse dignissim hendrerit turpis, in interdum tortor fermentum.</div>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btx-row" style="margin:0 -20px;">
                                                                <div class="btx-feature-item btx-p-border-border btx-col-12" style="padding:0 20px;">
                                                                    <div class="btx-feature-media ">
                                                                        <span class="btx-icon btx-icon--plain btx-icon--hover-plain btx-icon--medium">
                                                                            <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" >
                                                                                <img src="{{ url(explode(',', $data->articles[1]->image)[6]) }}" alt="" width="100" height="100" />
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="btx-feature-body">
                                                                        <div class="btx-feature-title btx-s-text-color btx-primary-font direction-rtl">انجمن تولیدکنندگان مواد شیمیایی ساختمان</div>
                                                                        <!--<div class="btx-feature-description direction-rtl">Suspendisse dignissim hendrerit turpis, in interdum tortor fermentum.</div>-->
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
                <section class="btx-section js-dynamic-navbar btx-p-border-border btx-dark-scheme" data-index="4" data-scheme="dark">
                    <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                        <div class="btx-background-wrapper">
                            <div class="btx-background-inner" style="background-image:url({{ url(explode(',', $data->articles[2]->image)[0]) }}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                        </div>
                        <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#1d1d1d; opacity:0.7;"></div>
                    </div>
                    <div class="btx-section-wrapper" style="padding-top:50px; padding-bottom:50px;">
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
                                                    <div class="btx-item js-item-quote btx-quote btx-quote--standard btx-with-background" >
                                                        <div class="btx-quote-author btx-s-text-color">
                                                            <span class="font-style direction-rtl" style="font-size: 16px; padding-bottom: 15px">{{ $data->articles[2]->name }}</span>
                                                        </div>
                                                        <div class="btx-quote-text btx-s-text-color btx-custom_c-font text-justify">
                                                            <span class="font-style direction-rtl" style="font-size: 13px;">
                                                                {!! $data->articles[2]->text !!}
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
                                        <div class="btx-box-inner"  data-height="" style="max-height: 600px">
                                            <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                <div class="btx-box-body" style="padding-top:30px; padding-bottom:30px;">
                                                    <div class="btx-item js-item-space btx-space" style="height:40px;"></div>
                                                    <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align" >
                                                        <h2 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border direction-rtl">
                                                            <div class="btx-col-12">
                                                                <span class="font-style" style="font-size: 16px; padding-bottom: 10px">{{ $data->articles[3]->name }}</span>
                                                            </div>
                                                        </h2>
                                                    </div>
                                                    <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                        <div class="btx-row" style="margin:0 -30px;">
                                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                <div class="btx-text-content-inner direction-rtl text-justify">
                                                                    {!! $data->articles[3]->text !!}
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
                                        <div class="btx-box-inner"  data-height="" style="max-height: 600px">
                                            <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                <div class="btx-box-body" >
                                                    <div class="btx-item js-item-image btx-image btx-center-align anmt-item anmt-fadeinu" style="margin-right:5%; margin-left:20%;">
                                                        <div class="btx-image-container">
                                                            <img src="{{ url(explode(',', $data->articles[3]->image)[0]) }}" alt="" style="max-width:100%;" width="488" height="1200"  />
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
                <section class="btx-section js-dynamic-navbar btx-p-border-border" style="border-bottom-width:1px; border-bottom-style:solid;" data-index="1">
                    <div class="btx-background" data-type="image" data-parallaxspeed="2" data-contentfade="" data-mobileparallax="">
                        <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#f5f5f5; opacity:1;"></div>
                    </div>
                    <div class="btx-section-wrapper">
                        <div class="btx-container">
                            <div class="btx-row btx-row--main">
                                <div class="btx-col-12">
                                    <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align" style="margin-bottom:15px;">
                                        <h3 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border" style="letter-spacing:0px;">{{ $consent->name }}</h3>
                                    </div>
                                    <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font" style="margin-bottom:0px;">
                                        <div class="btx-row" style="margin:0 -30px;">
                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                <div class="btx-text-content-inner text-justify direction-rtl">{!! $consent->text !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btx-row btx-row--main">
                                @foreach($consent->articles as $row)
                                <div class="btx-col-4 float-right">
                                    <div class="btx-item js-item-testimonial btx-testimonial btx-testimonial--border btx-right-align btx-testimonial--with-background">
                                        <div class="btx-testimonial-item btx-s-text-color btx-p-bg-bg btx-p-border-border" style="background-color:rgba(245,245,245,1); border-width:1px;">
                                            <div class="btx-testimonial-item-inner" style="padding-top:60px; padding-right:15%; padding-left:15%; padding-bottom:60px; min-height: 270px">
                                                <blockquote class="btx-primary-font text-justify direction-rtl" style="border: none">
                                                    <span class="font-style" style="font-size: 13px;">
                                                        {!! explode('<hr />', $row->text)[1] !!}
                                                    </span>
                                                </blockquote>
                                                <div class="btx-testimonial-media btx-image--circle">
                                                    <div class="btx-media-body text-right">
                                                        <div class="btx-testimonial-author-name">
                                                            {{ $row->name }}
                                                            <br>
                                                        </div>
                                                        <div class="btx-testimonial-author-title btx-p-text-color">
                                                            <span style="color: rgb(137, 137, 137);">
                                                                {!! explode('<hr />', $row->text)[0] !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <section class="btx-section js-dynamic-navbar btx-p-border-border" style="border-bottom-width:1px; border-bottom-style:solid;" data-index="1">
                    <div class="btx-section-wrapper">
                        <div class="btx-container">
                            <div class="btx-row btx-row--main">
                                <div class="btx-col-12">
                                    <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font" style="margin-bottom:0px;">
                                        <div class="btx-row" style="margin:0 -30px;">
                                            <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                <div class="btx-text-content-inner text-justify direction-rtl">
                                                    {!! $data->articles[4]->text !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-item js-item-client btx-client btx-client--carousel btx-client--separator">
                                        <div class="btx-client-content" style="margin:0 -39px 0 -40px;" data-display="5" data-scroll="5" data-loop="true">
                                            @foreach(explode(',', $data->articles[4]->image) as $row)
                                            <div class="btx-client-item btx-p-border-border btx-col-1-5" style="padding:0 40px;">
                                                <div class="btx-client-media  anmt-image-greyscale">
                                                    <img src="{{ url($row) }}" alt="" width="300" height="300" />
                                                </div>
                                            </div>
                                            @endforeach
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
@endsection