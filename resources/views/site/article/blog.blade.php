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
                        <div class="btx-background-inner" style="background-image:url({{ url('/' . @$data->image) }}); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                    </div>
                    <div class="btx-background-overlay btx-p-bg-bg" style="background-color:#1d1d1d; opacity:0.6;"></div>
                </div>
                <div class="btx-page-hero-inner btx-container">
                    <div class="btx-page-hero-wrapper btx-center-align">
                        <div class="btx-page-hero-content btx-middle-vertical">
                            <div class="btx-page-hero-content-wrapper btx-center-align" style="max-width:550px;">
                                <div class="btx-page-hero-body">
                                    <div class="btx-page-hero-body-title">
                                        <h1 class="btx-page-hero-title btx-s-text-color btx-secondary-font direction-rtl" style="color:#fff">{{ $title }}</h1>
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
                                                @foreach($data->articles as $row)
                                                <article class="btx-entry btx-entry--standard  post-141 post type-post status-publish format-standard has-post-thumbnail hentry category-travel tag-mountain tag-winter" style="margin-bottom:60px;">
                                                    <div class="btx-entry-inner anmt-item anmt-fadein">
                                                        <div class="btx-entry-timeline-icon btx-p-border-bg"></div>
                                                        <div class="btx-entry-header">
                                                            <div class="btx-entry-media btx-s-text-color">
                                                                <a class="" href="{{ url('blogs/' . $row->id) }}">
                                                                    <img src="{{ url($row->image) }}" alt="{{ url($row->name) }}" style="max-height: 400px; max-width: 400px; width: auto; height: auto"  />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="btx-entry-body direction-rtl">
                                                            <div class="btx-entry-body-inner btx-s-bg-bg " style="background-color:rgba(255,255,255,1); border-color:#ffffff; padding:40px;">
                                                                <div class="btx-entry-timeline-header btx-p-border-border btx-s-text-color btx-primary-font">
                                                                    @php
                                                                        $day=\Morilog\Jalali\jDateTime::strftime('j', $row->created_at);
                                                                        $month=\Morilog\Jalali\jDateTime::strftime('F', $row->created_at);
                                                                        $year=\Morilog\Jalali\jDateTime::strftime('Y', $row->created_at);
                                                                    @endphp
                                                                    <div class="btx-entry-timeline-day float-right">
                                                                        {{ \Morilog\Jalali\jDateTime::convertNumbers($day) }}
                                                                    </div>
                                                                    <div class="btx-entry-timeline-subheader">
                                                                        <h4>
                                                                            {{ \Morilog\Jalali\jDateTime::convertNumbers($month) }}
                                                                        </h4>
                                                                        <h4>
                                                                            {{ \Morilog\Jalali\jDateTime::convertNumbers($year) }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <h4 class="btx-entry-title btx-s-text-color btx-secondary-font">
                                                                    <a href="{{ url('blogs/' . $row->id) }}">
                                                                        <h3 class="btx-post-title">
                                                                            {{ $row->name }}
                                                                        </h3></a>
                                                                </h4>
                                                                <div class="btx-entry-excerpt text-justify">
                                                                    {!! mb_substr($row->text, 0, $row->summary_character_count) !!} ...
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
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
    </main>
@endsection