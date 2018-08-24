<div class="de-video-container" style="background-image: url('{{ asset($history->image) }}')">
    <div class="de-video-content">
        <div class="container">
            <div class="row dir-right">
                @foreach($history->articles as $row)
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h1 class="animated" data-animation="fadeInUp">
                            {!! $row->name !!}
                            <span class="id-color">مانا نشان</span>
                            <span class="small-border animated" data-animation="fadeInUp"></span>
                        </h1>
                        <div class="animated" data-animation="fadeInUp">
                            {!! $row->text !!}
                            <div class="spacer-single"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>