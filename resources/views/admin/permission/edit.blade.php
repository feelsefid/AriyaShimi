@extends('home')

@section('sub_content')

    <div class="edit_user">
        {{ Form::model($user, ['url' => url('user/' . $user->id), 'class' => 'form-horizontal', 'method' => 'put']) }}
        <div class="block-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h2>@lang('side_menu.articles')</h2>
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
                        {{ Form::select('roles[]', $roles, $selected_roles, ['id' => 'role','class' => 'form-control chosen', 'multiple', 'data-placeholder' => trans('forms.chosen-select')]) }}
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
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
