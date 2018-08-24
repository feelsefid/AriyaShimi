<div class="image-container col-md-5 pull-left animated" data-animation="fadeInLeft" data-delay="0" style="background-image: url('{{ asset($design_studio->image) }}')"></div>
<div class="container">
    <div class="row">
        <div class="inner-padding">
            @foreach($design_studio->articles as $row)
                <div class="col-md-6 col-md-offset-6 animated dir-right text-justify" data-animation="fadeInRight" data-delay="200">
                    <h2>{!! $row->name !!}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            {!! $row->text !!}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>