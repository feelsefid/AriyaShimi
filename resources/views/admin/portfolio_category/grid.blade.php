@if(count($data) > 0)
    @foreach($data as $row)
        <tr style="direction: ltr; text-align: right">
            <td class="text-center">
                @if($row->removable)
                <label for="chk-{{ $row->id }}" class="unchecked">
                    {{ Form::checkbox('items[]', $row->id, null, ['id' => 'chk-' . $row->id]) }}
                </label>
                @endif
            </td>
            <td>
                @permission('edit.portfolio_category')
                <a href="{{ url('panel/portfolio_category/' . $row->id . '/edit') }}">
                @endpermission
                    @if($row->parents)
                        {{ $row->parents }} -->
                    @endif
                    {{ $row->name }}
                @permission('edit.portfolio_category')
                <i class="fa fa-pencil"></i>
                </a>
                @endpermission
            </td>
            <td class="text-center">{{$row->language}}</td>
            <td class="text-center">
                @permission('edit.portfolio_category')
                <a class="action status" data-value="{{ $row->status == 1 ? 2 : 1 }}" data-id="{{ $row->id }}" href="{{ url('panel/portfolio_category/status') }}">
                @endpermission
                    @if($row->status=="1")
                        <i class="fa fa-star" style="color:#5cb85c" title="@lang('general.active')"></i>
                    @else
                        <i class="fa fa-star-o" style="color:red;" title="@lang('general.deactive')"></i>
                    @endif
                @permission('edit.portfolio_category')
                </a>
                @endpermission
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="10" style="background-color: #fff; text-align: center; padding: 10px">
            <div class="col-lg-6 col-md-6 pull-left" style="margin-top: 5px">
                {{ Form::select('srch_paginate',
                    [
                        '*' => trans('general.all'),
                        20 => 20,
                        50 => 50,
                        100 => 100,
                        250 => 250
                    ], $filter['srch_paginate'], ['class' => 'ms form-control col-md-1 col-lg-1 pull-left'])
                }}

                <span class="pull-left" style="margin: 12px 10px">
                    @lang('general.paginate_text', [
                        'from' => $data->currentPage() * $data->perPage() - $data->perPage() + 1,
                        'to' => $data->currentPage() * $data->perPage() > $data->total() ? $data->total() : $data->currentPage() * $data->perPage(),
                        'all' => $data->total()
                    ])
                </span>
            </div>
            <div class="col-lg-6 col-md-6 pull-left" style="float: right; margin-top: 5px">
                {{ $data->appends($filter)->links() }}
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="15" style="padding: 10px; text-align: center; background-color: #fff">
            <b><i>@lang('general.no_result')</i></b>
        </td>
    </tr>
@endif