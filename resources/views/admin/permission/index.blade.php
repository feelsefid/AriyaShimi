@extends('layouts.admin')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h2>@lang('side_menu.users')</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>@lang('side_menu.permissions_list')</h2>
                    </div>
                    <div class="body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#role"> <i class="zmdi zmdi-info"></i> @lang('user.permission_to_role') </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user"><i class="zmdi zmdi-settings"></i> @lang('user.permission_to_user') </a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active table-responsive" id="role">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td>{{ trans('user.role') }}</td>
                                        </tr>
                                    </thead>
                                    @if(count($permission_role) > 0)
                                        @foreach($permission_role as $role)
                                            <tr>
                                                <td>
                                                    @permission('edit.permission')
                                                        <a href="{{ url('panel/permission/role/' . $role->id . '/edit') }}">
                                                            <i class="fa fa-pencil"></i>
                                                            {{ $role->name }}
                                                        </a>
                                                    @endpermission
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="15" style="padding: 10px; text-align: center; background-color: #fff">
                                                <b><i>@lang('general.no_result')</i></b>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="10" style="text-align: center">{{ $permission_role->links() }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div role="tabpanel" class="tab-pane table-responsive" id="user">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td>{{ trans('general.fullname') }}</td>
                                        </tr>
                                    </thead>
                                    @if(count($permission_user) > 0)
                                        @foreach($permission_user as $user)
                                            <tr>
                                                <td>
                                                    @permission('edit.permission')
                                                    <a href="{{ url('panel/permission/user/' . $user->id . '/edit') }}">
                                                        <i class="fa fa-pencil"></i>
                                                        {{ $user->name }}
                                                    </a>
                                                    @endpermission
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="15" style="padding: 10px; text-align: center; background-color: #fff">
                                                <b><i>@lang('general.no_result')</i></b>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="10" style="text-align: center">{{ $permission_user->links() }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#users, #permission_list').addClass('active');
    </script>
@endsection
