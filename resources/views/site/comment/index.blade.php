<div class="container">
    @foreach($comment as $rows)
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="animated" data-animation="fadeInUp">{!! $rows->name !!}</h1><span class="small-border animated" data-animation="fadeInUp"></span>
                <div class="spacer-single"></div>
            </div>
        </div>

        <div class="de_carousel row animated" data-animation="fadeInUp" data-delay="200" id="testimonial-carousel">
            @foreach($rows->articles as $row)
            <div class="col-md-4 item">
                <div class="de_testi">
                    <blockquote>
                        <p>{!! $row->text !!}</p>
                    </blockquote>
                    <div class="de_testi_by">
                        <div class="de_testi_pic"><img alt="" class="img-circle" src="{{ asset('site/images/icon/1.jpg') }}"></div>
                        <div class="de_testi_company">
                            {!! $row->name !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endforeach
</div>