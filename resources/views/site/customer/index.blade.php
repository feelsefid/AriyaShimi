<div class="container">
    <!-- logo carousel -->
    @foreach($customer->articles as $row)
    <div class="row">
        <div class="logo-carousel">
            <ul class="slides" id="logo-carousel">
                @foreach(explode(',', $row->image) as $image)
                    <li>
                        <div class="col-md-2" style="width: 100%">
                            <img alt="" src="{{ url($image) }}" style="display: block; margin: auto">
                        </div>
                    </li>
                @endforeach
            </ul>
        </div><!-- logo carousel close -->
    </div>
    @endforeach
</div>