@extends('layouts.site')

@section('content')
        <!-- subheader -->
        <section id="subheader" data-speed="8" data-type="background" style="background-image: url('{{ "site/images/blog/baner-blog.png" }}'); background-position: center; background-size: cover; background-repeat: no-repeat">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <h1 class="float-right" style="color: #FFFFFF">{{ $news->name }}</h1>
                    </div>
                </div>
            </div>
        </section><!-- subheader close -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="blog-list">
                        <li>
                            <div class="date-box">
                                <span class="day">{{ $day }}</span>
                                <span class="month">{{ $month }}</span>
                            </div>
                            <div class="post-content">
                                <div class="post-image">
                                    <div class="blog-slide">
                                        <img src="{{ url($news->image) }}" alt="" />
                                    </div>
                                </div>
                                <div class="post-text dir-right text-right" style="padding-top: 20px">
                                    <h3><a href="{{ url('article/' . $news->id) }}">{{ $news->name }}</a></h3>
                                    {!! $news->text !!}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
@endsection