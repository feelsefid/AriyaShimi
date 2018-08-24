@if(count($data) > 0)
    @foreach($data as $row)
        <tr style="direction: ltr; text-align: right">
            <td class="text-center">
                <label for="chk-{{ $row->id }}" class="unchecked">
                    {{ Form::checkbox('items[]', $row->id, null, ['id' => 'chk-' . $row->id]) }}
                </label>
            </td>
            <td>
                @permission('edit.team')
                <a href="{{ url('panel/team/' . $row->id . '/edit') }}">
                @endpermission
                    {{ $row->name }}
                @permission('edit.team')
                <i class="fa fa-pencil"></i>
                </a>
                @endpermission
            </td>
            <td class="text-center">{{$row->position}}</td>
            <td class="text-center">{{$row->language}}</td>
            <td class="text-center">
                @permission('edit.team')
                <a class="action status" data-value="{{ $row->status == 1 ? 2 : 1 }}" data-id="{{ $row->id }}" href="{{ url('panel/team/status') }}">
                @endpermission
                    @if($row->status=="1")
                        <i class="fa fa-star" style="color:#5cb85c" title="@lang('form.active')"></i>
                    @else
                        <i class="fa fa-star-o" style="color:red;" title="@lang('form.deactive')"></i>
                    @endif
                @permission('edit.team')
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