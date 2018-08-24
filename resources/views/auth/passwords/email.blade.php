@extends('layouts.auth')

@section('content')

    <div class="col-md-12 content-center">
        <div class="card-plain">
            <img src="{{ url('general/images/pyramid-logo.png') }}" style="margin:auto; margin-bottom: 20px;width:200px; display: block">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{ Form::open(['url' => route('password.email')]) }}
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="width: 304px; border-radius: 20px">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="nav-item">
                    <button type="submit" class="nav-link btn btn-primary btn-round" style="width: 304px; float: left;background-color: #E6212D;">Submit</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
