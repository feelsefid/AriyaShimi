@if(count($data) > 0)
    @foreach($data as $row)
        <tr style="direction: ltr; text-align: right">
            <td class="text-center text-middle">
                <label for="chk-{{ $row->id }}" class="unchecked">
                    {{ Form::checkbox('items[]', $row->id, null, ['id' => 'chk-' . $row->id]) }}
                </label>
            </td>
            <td class="text-middle text-center">
                <a href="{{ url($row->image) }}" class="fancybox" rel="slide_{{ $row->slide_show_categories_id }}">
                    <img src="{{ url($row->image) }}" class="img-thumbnail" style="height: 35px !important;">
                </a>
            </td>
            <td class="text-middle">
                @permission('edit.slide_show')
                <a href="{{ url('panel/slide_show/' . $row->id . '/edit') }}">
                @endpermission
                    {{ $row->name }}
                @permission('edit.slide_show')
                <i class="fa fa-pencil"></i>
                </a>
                @endpermission
            </td>
            <td class="text-center text-middle">{{ $row->slide_show_categories->name }}</td>
            <td class="text-center text-middle">{{$row->language}}</td>
            <td class="text-center text-middle">
                @permission('edit.slide_show')
                <a class="action status" data-value="{{ $row->status == 1 ? 2 : 1 }}" data-id="{{ $row->id }}" href="{{ url('panel/slide_show/status') }}">
                @endpermission
                    @if($row->status=="1")
                        <i class="fa fa-star" style="color:#5cb85c" title="@lang('general.active')"></i>
                    @else
                        <i class="fa fa-star-o" style="color:red;" title="@lang('general.deactive')"></i>
                    @endif
                @permission('edit.slide_show')
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