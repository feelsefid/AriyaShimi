@extends('layouts.auth')

@section('content')

    <div class="col-md-12 content-center">
        <div class="card-plain">
            <img src="{{ url('general/images/pyramid-logo.png') }}" style="margin:auto; margin-bottom: 20px; display: block; width: 200px">
            {{ Form::open(['url' => url('/login')]) }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="width: 304px; border-radius: 20px">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Username (Email)">
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="width: 304px; border-radius: 20px">
                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                {!! app('captcha')->display($attributes = [], $options = ['lang'=> 'en']) !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="cr-warning w3-text-red">
                        {{ $errors->first('g-recaptcha-response') }}
                    </span>
                @endif
            </div>


            <div class="nav-item">
                <button type="submit" class="nav-link btn btn-primary btn-round" style="width: 304px; float: left;background-color: #E6212D;">Login</button>
            </div>
            <a href="{{ url('password/reset') }}" style="color: #fff; padding-bottom: 20px">Forgot Password?Click here</a>

            {{ Form::close() }}

        </div>
    </div>

@endsection