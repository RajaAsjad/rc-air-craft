@foreach($whychooses as $key=>$whychoose)
    <tr id="id-{{ $whychoose->id }}">
        <td>{{ $whychooses->firstItem()+$key }}.</td>
        <td>
            @if($whychoose->image)
                <img src="{{ asset('public/admin/assets/images/why_choose/'.$whychoose->image) }}" alt="" style="width:60px; height:40px">
            @else
                <img src="{{ asset('public/admin/assets/images/why_choose/no-photo1.jpg') }}" alt="" style="width:60px;">
            @endif
        </td>
        <td>
            @if($whychoose->icon)
                <img src="{{ asset('public/admin/assets/images/why_choose/'.$whychoose->icon) }}" alt="" style="width:60px; height:40px">
            @else
                <img src="{{ asset('public/admin/assets/images/why_choose/no-photo1.jpg') }}" alt="" style="width:60px;">
            @endif
        </td>
        <td>{!! \Illuminate\Support\Str::limit($whychoose->name,40) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($whychoose->content,60) !!}</td>
        <td>
            @if($whychoose->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('why_choose-edit')
                <a href="{{ route('why_choose.edit', $whychoose->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('why_choose-delete')
                <a class="btn btn-danger btn-xs delete-btn" data-whychoose-id="{{ $whychoose->id }}"><i class="fa fa-trash"></i> Delete</a>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="5">
        Displying {{$whychooses->firstItem()}} to {{$whychooses->lastItem()}} of {{$whychooses->total()}} records
        <div class="d-flex justify-content-center">
            {!! $whychooses->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
