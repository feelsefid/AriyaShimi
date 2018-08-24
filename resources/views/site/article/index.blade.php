@foreach($news as $rows)
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="animated" data-animation="fadeInUp">{{ $rows->name }}<span class="small-border animated" data-animation="fadeInUp"></span></h1>
            <div class="spacer-double"></div>
        </div>
        <div class="animated" data-animation="fadeInUp" data-delay="200">
            @foreach($rows->articles as $row)
                <div class="col-md-4 bloglist">
                    <div class="post-content">
                        <div class="post-image">
                            <div class="flexslider blog-slider">
                                <div class="overlay"></div>
                                <ul class="slides">
                                    <li><img alt="" src="{{ url($row->image) }}"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-text">
                            <h3><a href="{{ url('article/' . $row->id) }}">{!! $row->name !!}</a></h3>
                            {!! mb_substr($row->text, 0, 250) . '...' !!}
                            <br>
                            <a href="{{ url('article/' . $row->id) }}" rel="bookmark" class="btn-text">@lang('general.read_more')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach