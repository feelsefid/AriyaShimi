@extends('layouts.admin')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h2>@lang('side_menu.slide_show_category')</h2>
            </div>
            <div class="col-md-9">
                <input type="hidden" name="save" id="saveMethod" value="">
                @permission('delete.slide_show_category')
                <a class="btn btn-sm pull-left bg-blush delete" href="{{ url('panel/slide_show_category') }}">
                    <i class="fa fa-trash"></i>
                    @lang('form.delete')
                </a>
                @endpermission
                @permission('edit.slide_show_category')
                <a class="btn btn-sm bg-blue pull-left actived" href="{{ url('panel/slide_show_category/status') }}">
                    <i class="fa fa-star"></i>
                    @lang('form.active')
                </a>
                <a class="btn btn-sm bg-grey pull-left deactived" href="{{ url('panel/slide_show_category/status') }}">
                    <i class="fa fa-star-o"></i>
                    @lang('form.deactive')
                </a>
                @endpermission
                @permission('create.slide_show_category')
                <a class="btn btn-sm bg-green pull-left" href="{{ url('panel/slide_show_category/create') }}">
                    <i class="fa fa-plus"></i>
                    @lang('form.add')
                </a>
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
                        <h2>@lang('slide_show.category_list')</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive" style="min-height: 350px">
                            <form action="{{ url('panel/slide_show_category') }}" method="GET" id="search">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-bordered" id="grid">
                                    <thead>
                                        <tr>
                                            <td style="width: 3%">
                                                <label for="selectAll" class="unchecked">
                                                    <input type="checkbox" name="selectAll" id="selectAll">
                                                </label>
                                            </td>

                                            <td style="width: 72%" class="text-right">
                                                <a id="srch_name_sort" class="sort">
                                                    <input type="hidden" name="srch_name_sort">
                                                    <i class="fa fa-arrow-circle-up text-default"></i>
                                                </a>
                                                <input type="text" name="srch_name" value="" class="form-control" placeholder="@lang('slide_show.category_title')">
                                            </td>

                                            <td style="width: 10%" class="text-right">
                                                <a id="srch_language_sort" class="sort">
                                                    <input type="hidden" name="srch_language_sort">
                                                    <i class="fa fa-arrow-circle-up text-default"></i>
                                                </a>
                                                <select name="srch_language" class="form-control ms">
                                                    <option value="">@lang('general.language')</option>
                                                    <option value="fa">Fa</option>
                                                    <option value="en">En</option>
                                                </select>
                                            </td>

                                            <td style="width: 15%">
                                                <select name="srch_status" class="form-control ms">
                                                    <option value="">@lang('general.status')</option>
                                                    <option value="1">@lang('form.active')</option>
                                                    <option value="2">@lang('form.deactive')</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('admin.slide_show_category.grid')
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#modules, #slide_show_category').addClass('active');
    </script>
@endsection