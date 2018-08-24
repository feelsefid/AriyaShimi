@extends('home')

@section('sub_content')

@if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('user') }}">
    <div class="box-header">
        <span class="box-title">{{ trans('user.add') }}</span>
    </div>
    <div class="box-body">
        {{ csrf_field() }}

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            {{ Form::label(trans('user.fullname')) }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            {{ Form::label(trans('user.email')) }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            {{ Form::label(trans('user.password')) }}
            {{ Form::password('password', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            {{ Form::label(trans('user.confirm-password')) }}
            {{ Form::password('confirm-password', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{ Form::label(trans('user.role')) }}
            {{ Form::select('roles[]', $roles, null, ['id' => 'role', 'class' => 'form-control chosen', 'multiple', 'data-placeholder' => trans('forms.chosen-select')]) }}
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary" style="margin-right: 20px">
            <i class="fa fa-save"></i>
            {{ trans('forms.register') }}
        </button>
        <a href="{{ url('user') }}" class="btn btn-default">
            <i class="fa fa-backward"></i>
            {{ trans('forms.cancel') }}
        </a>
    </div>
    {!! Form::close() !!}
</div>
@endsection
