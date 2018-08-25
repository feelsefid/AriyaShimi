@extends('layouts.second')

@section('title', $data->title_seo)

@section('seo')
    <meta name="description" content="{{ $data->description_seo }}">
    <meta name="keywords" content="{{ $data->keyword_seo }}">
@endsection

@section('content')
    <main class="btx-content btx-content--no-header" id="main">
        <article id="post-135" class="post-135 post type-post status-publish format-standard has-post-thumbnail hentry category-lifestyle category-travel tag-ocean tag-sail tag-trip">
            <div class="btx-post btx-post--magazine btx-post--no-sidebar btx-post-format--standard btx-post-featured--overlap">
                <!--Fullwidth size featured media-->
                <div class="btx-post-media btx-post-media--standard">
                    <div class="btx-background" data-type="image" data-parallaxspeed="5" data-contentfade="1" data-mobileparallax="">
                        <div class="btx-background-wrapper">
                            <div class="btx-background-inner" style="background-image:url({{ url('/') }}/site/images/article/ArticleBackground.jpg); background-size:cover; background-position:center center; background-repeat:repeat;"></div>
                        </div>
                        <div class="btx-background-overlay "></div>
                    </div>
                </div>
                <div class="btx-container js-dynamic-navbar">
                    <div class="btx-main btx-main--single">
                        <div class="btx-main-wrapper">
                            <!--Post Title (overlap layout and full layout not standard post format)-->
                            <div class="btx-post-headline">
                                <h3 class="btx-post-title">{{ $data->name }}</h3>
                            </div>
                            <!--Begin Main Post Part-->
                            <!--Content Part-->
                            <div class="btx-post-content" dir="@lang('general.direction')">
                                <div class="btx-item btx-image btx-overlapright-position modal-image">
                                    <div class="btx-image-container">
                                        <a class="btx-media-link" href="{{ url($data->image) }}" target="_blank">
                                            <img src="{{ url($data->image) }}" alt="" style="max-width:100%;" width="1024" height="683" />
                                        </a>
                                    </div>
                                </div>
                                {!!  $data->text !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>
@endsection