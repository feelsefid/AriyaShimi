@extends('layouts.admin')

@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h2>@lang('side_menu.users')</h2>
            </div>
            <div class="col-md-9">
                <input type="hidden" name="save" id="saveMethod" value="">

                <a href="{{ url('panel/permission') }}" class="btn btn-sm btn-back pull-left bg-blush">
                    @lang('form.back')
                </a>

                @permission('edit.permission')
                <button class="btn btn-sm btn-save pull-left bg-green" type="button" onclick="$('#btn-permission').trigger('click')">
                    <span class="fa fa-check"></span>
                    @lang('form.save')
                </button>
                @endpermission
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            @lang('general.fullname'): <strong>{{ $permission_user->name }}</strong>
                        </h2>
                    </div>
                    <div class="body">
                        {{ Form::open(['url' => url('panel/permission/user/' . $permission_user->id), 'class' => 'form-horizontal']) }}
                        {{ method_field('put') }}
                        {{ csrf_field() }}
                            @foreach($data as $model => $vals)
                                <div class="btns" style="margin-top: 20px">
                                    <strong>:: {{ $model }} ::</strong>
                                    <hr style="margin: 5px">
                                    @foreach($vals as $description => $val)
                                        @foreach($val as $key => $value)
                                            <label class="btn btn-default chk col-md-3" for="chk_{{ $value->id }}">
                                                <!-- If role has this permission then checked is true -->
                                                @if(@in_array($value->id, $perms))
                                                    {{ Form::checkbox('perms[]', $value->id, null,
                                                        [
                                                            'id' => 'chk_' . $value->id,
                                                            'checked' => true
                                                        ])
                                                    }}
                                                @else
                                                    <!-- If role hasen't this permission checked is false -->
                                                    {{ Form::checkbox('perms[]', $value->id, null, ['id' => 'chk_' . $value->id]) }}
                                                @endif

                                                <i class="fa fa-close"></i>
                                                {{ $value->name }}
                                            </label>
                                        @endforeach
                                    @endforeach
                                </div>
                            @endforeach
                            <button type="submit" style="display: none" id="btn-permission"></button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        input[type=checkbox] {
            display: none;
        }
        .btns .col-md-3 {
            width: 24% !important;
        }
    </style>

    <script>
        $('#users, #permission_list').addClass('active');
    </script>
@endsection
