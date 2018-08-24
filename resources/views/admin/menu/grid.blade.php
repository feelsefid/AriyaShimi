@if(count($data) > 0)
    @foreach($data as $row)
        <tr data-id="{{$row->id}}" class="ui-state-default" style="direction: ltr; text-align: right">
            <td class="text-center">
                @if($row->removable)
                <label for="chk-{{ $row->id }}" class="unchecked">
                    {{ Form::checkbox('items[]', $row->id, null, ['id' => 'chk-' . $row->id]) }}
                </label>
                @endif

            </td>
            <td>
                @permission('edit.menu')
                <a href="{{ url('panel/menu/' . $row->id . '/edit') }}">
                @endpermission
                    @if($row->parents)
                        @foreach($row->parents as $parent)
                            {{ $parent }} -->
                        @endforeach
                    @endif
                    {{ $row->name }}
                @permission('edit.menu')
                <i class="fa fa-pencil"></i>
                </a>
                @endpermission
            </td>
            <td class="text-center">{{ trans('menu.' . $row->type) }}</td>
            <td class="text-center">{{ $row->menu_categories->name }}</td>
            <td class="text-center">{{$row->language}}</td>
            <td class="text-center">
                @permission('edit.menu')
                <a class="action status" data-value="{{ $row->status == 1 ? 2 : 1 }}" data-id="{{ $row->id }}" href="{{ url('panel/menu/status') }}">
                @endpermission
                    @if($row->status=="1")
                        <i class="fa fa-star" style="color:#5cb85c" title="@lang('general.active')"></i>
                    @else
                        <i class="fa fa-star-o" style="color:red;" title="@lang('general.deactive')"></i>
                    @endif
                @permission('edit.menu')
                </a>
                @endpermission
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="10" style="text-align: center">{{ $data->appends($filter)->links() }}</td>
    </tr>
@else
    <tr>
        <td colspan="15" style="padding: 10px; text-align: center; background-color: #fff">
            <b><i>@lang('general.no_result')</i></b>
        </td>
    </tr>
@endif