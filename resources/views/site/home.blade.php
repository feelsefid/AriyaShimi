@extends('layouts.site')

@section('title', $setting->title)

@section('seo')
    <meta name="description" content="{{ $setting->description_seo }}">
    <meta name="keywords" content="{{ $setting->keyword_seo }}">
@endsection

@section('content')
    <main class="hidden-sm hidden-xs btx-content btx-content--with-header btx-scrollpage btx-scrollpage--half" id="main">
        <article id="post-565" class="btx-content-wrapper post-565 page type-page status-publish has-post-thumbnail hentry">
            <div class="btx-main btx-main--single">
                <div class="btx-main-wrapper">
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="0">
                        <div class="btx-section-wrapper">
                            <div class="btx-container--fullwidth">
                                <div class="btx-row btx-row--main btx-row--no-spacing">

                                    <!--#############################################################################################################################-->

                                    <div class="btx-col-6">

                                        <!--#############################################################################################################################-->

                                        @if(!empty($data[0]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-dark-scheme">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url(explode(',', $data[0]['image'])[0]) }}); background-size:cover; background-position:left center; background-repeat:repeat;"></div>
                                                </div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                    <div class="btx-box-body">
                                                        <div class="btx-item js-item-space btx-space" style="height:500px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if(!empty($data[1]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url('/') }}/site/upload/bg-nautical.jpg); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                </div>
                                                <div class="btx-background-overlay " style="background-color:#f5f5f5; opacity:0.2;"></div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="max-width:780px; overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:8%; padding-right:16%; padding-left:16%; padding-bottom:8%;">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align">
                                                            <h1 class="btx-heading-text btx-custom_b-font btx-s-text-color btx-s-text-border">
                                                                <span class="font-style font-style-big" style="font-size: 16px;">
                                                                    {{ $data[1]['name'] }}
                                                                </span>
                                                            </h1>
                                                        </div>
                                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-right-align" style="margin-top:10px; margin-bottom:10px;">
                                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:200px; height:1px; background-color:#dddddd;"></div>
                                                        </div>
                                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner">
                                                                        <span class="font-style text-align-justify direction-rtl" style="font-size: 13px;">
                                                                            <span style="color: rgb(137, 137, 137);">
                                                                                @if($data[1]['show_view_more'] == 1)
                                                                                    {!! mb_substr($data[1]['text'], 0, $data[1]['summary_character_count']) !!} ...
                                                                                @else
                                                                                    {!! $data[1]['text'] !!}
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($data[1]['show_view_more'] == 1)
                                                            <div class="btx-item js-item-space btx-space" style="height:10px;"></div>
                                                            <div class="btx-item js-item-button btx-button btx-button--border btx-left-align btx-button-size--medium btx-button-hover--brand btx-button-color--brand">
                                                                <a href="{{ url('about') }}" target="_blank" class="btnx" style="border-radius:40px; border-width:1px;">
                                                                    @lang('general.view_more')
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <!--#############################################################################################################################-->

                                        @if(!empty($data[2]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url(explode(',', $data[2]['image'])[0]) }}); background-size:cover; background-position:left center; background-repeat:repeat;"></div>
                                                </div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                    <div class="btx-box-body">
                                                        <div class="btx-item js-item-space btx-space" style="height:500px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if(!empty($data[3]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url('/') }}/site/upload/bg-nautical.jpg); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                </div>
                                                <div class="btx-background-overlay " style="background-color:#f5f5f5; opacity:0.2;"></div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:8%; padding-right:16%; padding-left:16%; padding-bottom:8%;">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align">
                                                            <h1 class="btx-heading-text btx-custom_b-font btx-s-text-color btx-s-text-border">
                                                                <span class="font-style font-style-big" style="font-size: 16px;">
                                                                    {{ $data[3]['name'] }}
                                                                </span>
                                                            </h1>
                                                        </div>
                                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-right-align" style="margin-top:10px; margin-bottom:10px;">
                                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:200px; height:1px; background-color:#dddddd;"></div>
                                                        </div>
                                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner">
                                                                        <span class="font-style text-align-justify direction-rtl" style="font-size: 13px;">
                                                                            <span style="color: rgb(137, 137, 137);">
                                                                                @if($data[3]['show_view_more'] == 1)
                                                                                    {!! mb_substr($data[3]['text'], 0, $data[3]['summary_character_count']) !!} ...
                                                                                @else
                                                                                    {!! $data[3]['text'] !!}
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($data[3]['show_view_more'] == 1)
                                                            <div class="btx-item js-item-space btx-space" style="height:10px;"></div>
                                                            <div class="btx-item js-item-button btx-button btx-button--border btx-left-align btx-button-size--medium btx-button-hover--brand btx-button-color--brand">
                                                                <a href="{{ url('about') }}" target="_blank" class="btnx" style="border-radius:40px; border-width:1px;">
                                                                    @lang('general.view_more')
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <!--#############################################################################################################################-->

                                        @if(!empty($data[4]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url(explode(',', $data[4]['image'])[0]) }}); background-size:cover; background-position:left center; background-repeat:repeat;"></div>
                                                </div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                    <div class="btx-box-body">
                                                        <div class="btx-item js-item-space btx-space" style="height:500px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <!--#################################################################################################################-->

                                    <div class="btx-col-6">
                                        @if(!empty($data[0]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url('/') }}/site/upload/bg-nautical.jpg); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                </div>
                                                <div class="btx-background-overlay " style="background-color:#f5f5f5; opacity:0.2;"></div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="max-width:700px; overflow-y:hidden;">
                                                    <div class="btx-box-body" style="padding-top:8%; padding-right:16%; padding-left:16%; padding-bottom:8%;">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align">
                                                            <h1 class="btx-heading-text btx-custom_b-font btx-s-text-color btx-s-text-border"><span class="font-style font-style-big" style="font-size: 16px;">{{ $data[0]['name'] }}</span></h1>
                                                        </div>
                                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-right-align" style="margin-top:10px; margin-bottom:10px;">
                                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:200px; height:1px; background-color:#dddddd;"></div>
                                                        </div>
                                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner">
                                                                        <span class="font-style text-align-justify direction-rtl" style="font-size: 13px;">
                                                                            <span style="color: rgb(137, 137, 137);">
                                                                                @if($data[0]['show_view_more'] == 1)
                                                                                    {!! mb_substr($data[0]['text'], 0, $data[0]['summary_character_count']) !!} ...
                                                                                @else
                                                                                    {!! $data[0]['text'] !!}
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($data[0]['show_view_more'] == 1)
                                                            <div class="btx-item js-item-space btx-space" style="height:10px;"></div>
                                                            <div class="btx-item js-item-button btx-button btx-button--border btx-left-align btx-button-size--medium btx-button-hover--brand btx-button-color--brand">
                                                                <a href="{{ url('about') }}" target="_blank" class="btnx" style="border-radius:40px; border-width:1px;">
                                                                    @lang('general.view_more')
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <!--#############################################################################################################################-->

                                        @if(!empty($data[1]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url(explode(',', $data[1]['image'])[0]) }}); background-size:cover; background-position:right center; background-repeat:repeat;"></div>
                                                </div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                    <div class="btx-box-body">
                                                        <div class="btx-item js-item-space btx-space" style="height:500px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if(!empty($data[2]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url('/') }}/site/upload/bg-nautical.jpg); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                </div>
                                                <div class="btx-background-overlay " style="background-color:#f5f5f5; opacity:0.2;"></div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="max-width:700px; overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:8%; padding-right:16%; padding-left:16%; padding-bottom:8%;">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align">
                                                            <h1 class="btx-heading-text btx-custom_b-font btx-s-text-color btx-s-text-border">
                                                                <span class="font-style font-style-big" style="font-size: 16px;">
                                                                    {{ $data[2]['name'] }}
                                                                </span>
                                                            </h1>
                                                        </div>
                                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-right-align" style="margin-top:10px; margin-bottom:10px;">
                                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:200px; height:1px; background-color:#dddddd;"></div>
                                                        </div>
                                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner">
                                                                        <span class="font-style text-align-justify direction-rtl" style="font-size: 13px;">
                                                                            <span style="color: rgb(137, 137, 137);">
                                                                                @if($data[2]['show_view_more'] == 1)
                                                                                    {!! mb_substr($data[2]['text'], 0, $data[2]['summary_character_count']) !!} ...
                                                                                @else
                                                                                    {!! $data[2]['text'] !!}
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($data[2]['show_view_more'] == 1)
                                                            <div class="btx-item js-item-space btx-space" style="height:10px;"></div>
                                                            <div class="btx-item js-item-button btx-button btx-button--border btx-left-align btx-button-size--medium btx-button-hover--brand btx-button-color--brand">
                                                                <a href="{{ url('about') }}" target="_blank" class="btnx" style="border-radius:40px; border-width:1px;">
                                                                    @lang('general.view_more')
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <!--#############################################################################################################################-->
                                        @if(!empty($data[3]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url(explode(',', $data[3]['image'])[0]) }}); background-size:cover; background-position:right center; background-repeat:repeat;"></div>
                                                </div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="overflow-y:hidden;">
                                                    <div class="btx-box-body">

                                                        <div class="btx-item js-item-space btx-space" style="height:500px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if(!empty($data[4]))
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border btx-light-scheme">
                                            <div class="btx-background" data-type="color" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-wrapper">
                                                    <div class="btx-background-inner" style="background-image:url({{ url('/') }}/site/upload/bg-nautical.jpg); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                                                </div>
                                                <div class="btx-background-overlay " style="background-color:#f5f5f5; opacity:0.2;"></div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="max-width:700px; overflow-y:auto;">
                                                    <div class="btx-box-body" style="padding-top:8%; padding-right:16%; padding-left:16%; padding-bottom:8%;">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-right-align">
                                                            <h1 class="btx-heading-text btx-custom_b-font btx-s-text-color btx-s-text-border">
                                                                <span class="font-style font-style-big" style="font-size: 16px;">
                                                                    {{ $data[4]['name'] }}
                                                                </span>
                                                            </h1>
                                                        </div>
                                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-right-align" style="margin-top:10px; margin-bottom:10px;">
                                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:200px; height:1px; background-color:#dddddd;"></div>
                                                        </div>
                                                        <div class="btx-item js-item-text btx-text btx-right-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner">
                                                                        <span class="font-style text-align-justify direction-rtl" style="font-size: 13px;">
                                                                            <span style="color: rgb(137, 137, 137);">
                                                                                @if($data[4]['show_view_more'] == 1)
                                                                                    {!! mb_substr($data[4]['text'], 0, $data[4]['summary_character_count']) !!} ...
                                                                                @else
                                                                                    {!! $data[4]['text'] !!}
                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($data[4]['show_view_more'] == 1)
                                                            <div class="btx-item js-item-space btx-space" style="height:10px;"></div>
                                                            <div class="btx-item js-item-button btx-button btx-button--border btx-left-align btx-button-size--medium btx-button-hover--brand btx-button-color--brand">
                                                                <a href="{{ url('about') }}" target="_blank" class="btnx" style="border-radius:40px; border-width:1px;">
                                                                    @lang('general.view_more')
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <!--#############################################################################################################################-->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </article>
    </main>
    <main class="btx-content btx-content--with-header hidden-lg hidden-md">
        <article id="post-3258" class="btx-content-wrapper post-3258 page type-page status-publish hentry" style="padding-top:0px;">
            <div class="btx-main btx-main--single">
                <div class="btx-main-wrapper">
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="0">
                        <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-overlay btx-p-bg-bg" style="opacity:0.9;"></div>
                        </div>
                        <div class="btx-section-wrapper" style="padding-top:120px; padding-bottom:120px;">
                            <div class="btx-container">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-box btx-box btx-center-align btx-p-border-border">
                                            <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                                                <div class="btx-background-overlay " style="opacity:0.9;"></div>
                                            </div>
                                            <div class="btx-box-inner" data-height="">
                                                <div class="btx-box-content btx-middle-vertical" style="max-width:733px; overflow-y:hidden;">
                                                    <div class="btx-box-body">
                                                        <div class="btx-item js-item-heading btx-heading btx-heading--plain btx-center-align btx-uppercase">
                                                            <h3 class="btx-heading-text btx-secondary-font btx-s-text-color btx-s-text-border">
                                                                {{ $data[0]['name'] }}
                                                                <br>
                                                            </h3>
                                                        </div>
                                                        <div class="btx-item js-item-divider btx-divider btx-divider--single btx-center-align" style="margin-top:30px; margin-bottom:30px;">
                                                            <div class="btx-divider-line btx-p-border-bg btx-p-border-border" style="width:100px; height:2px;">
                                                            </div>
                                                        </div>
                                                        <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font">
                                                            <div class="btx-row" style="margin:0 -30px;">
                                                                <div class="btx-text-content btx-col-12" style="padding:0 30px;">
                                                                    <div class="btx-text-content-inner">
                                                                        <span class="font-style text-justify direction-rtl" style="font-size: 13px;">
                                                                            {!! $data[0]['text'] !!}
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
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" id="work" data-index="1">
                        <div class="btx-background" data-type="image" data-parallaxspeed="0" data-contentfade="" data-mobileparallax="">
                            <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#eeeeee; opacity:0.9;"></div>
                        </div>
                        <div class="btx-section-wrapper" style="padding-top:0px; padding-bottom:0px;">
                            <div class="btx-container--fullwidth">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-portfolio btx-portfolio btx-portfolio--grid btx-center-align btx-portfolio--hover-content">
                                            <div class="btx-portfolio-content" style="margin:0 0px;">
                                                @foreach($data as $key => $row)
                                                    @if($key == 0)
                                                        @continue
                                                    @endif
                                                    <article class="btx-entry btx-entry-dark-scheme btx-col-12 post-305 btx_portfolio type-btx_portfolio status-publish has-post-thumbnail hentry btx_portfolio_category-branding btx_portfolio_category-web-design" style="padding:0 0px; margin-bottom:0px;" data-filter="Branding, Web Design">
                                                        <a href="#" class="btx-entry-inner anmt-item anmt-zoomout stagger anmt-content-slideup anmt-image-slowzoom">
                                                            <div class="btx-entry-header ">
                                                                <div class="btx-entry-media">
                                                                    @if(!empty(explode(',', $row['image'])[1]))
                                                                        <img src="{{ url(explode(',', $row['image'])[1]) }}" alt="" width="1024" height="768"  />
                                                                    @endif
                                                                </div>
                                                                <div class="btx-overlay" style="background-color:rgba(9,77,156,0.8);"></div>
                                                            </div>
                                                            <div class="btx-entry-body title-middle" style="padding:30px;">
                                                                <div class="btx-entry-body-inner">
                                                                    <div class="btx-entry-body-content">
                                                                        <h4 class="btx-entry-title btx-s-text-color btx-secondary-font" style="font-size:18px;">
                                                                            {{ $row['name'] }}
                                                                        </h4>
                                                                        <div class="btx-entry-category btx-s-text-color btx-primary-font direction-rtl">
                                                                            {!! $row['text'] !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </article>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="btx-section js-dynamic-navbar btx-p-border-border" data-index="6">
                        <div class="btx-section-wrapper" id="div_f52f_91">
                            <div class="btx-container--fullwidth">
                                <div class="btx-row btx-row--main">
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-text btx-text btx-center-align btx-primary-font btx-center-align-responsive">
                                            <div class="btx-row" id="div_f52f_92">
                                                <div class="btx-text-content btx-col-12" id="div_f52f_93">
                                                    <div class="btx-text-content-inner">
                                                            <span class="font-style" id="span_f52f_40">طراحی وب سایت و بهینه سازی وب سایت توسط آژانس فیل سفید
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btx-col-12">
                                        <div class="btx-item js-item-social btx-social btx-social--plain btx-center-align btx-center-align-responsive">
                                            <div class="btx-social-inner">
                                                <a href="http://www.instagram.com/" class="btx-social-item btx-social-instagram" target="_blank">
                                                        <span class="btx-icon btx-icon--with-hover btx-icon--plain btx-icon--hover-plain btx-icon--small">
                                                            <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" id="span_f52f_45">
                                                                <i class="fa fa-instagram"></i>
                                                            </span>
                                                            <span class="btx-icon-hover btx-icon-plain btx-s-brand-color" id="span_f52f_46">
                                                                <i class="fa fa-instagram"></i>
                                                            </span>
                                                        </span>
                                                </a>
                                                <a href="http://www.google.com/" class="btx-social-item btx-social-google-plus" target="_blank">
                                                        <span class="btx-icon btx-icon--with-hover btx-icon--plain btx-icon--hover-plain btx-icon--small">
                                                            <span class="btx-icon-normal btx-icon-plain btx-p-brand-color" id="span_f52f_47">
                                                                <i class="fa fa-envelope"></i>
                                                            </span>
                                                            <span class="btx-icon-hover btx-icon-plain btx-s-brand-color" id="span_f52f_48">
                                                                <i class="fa fa-envelope"></i>
                                                            </span>
                                                        </span>
                                                </a>
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