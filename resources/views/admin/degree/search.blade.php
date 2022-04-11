@foreach($degrees as $key=>$degree)
    <tr id="id-{{ $degree->slug }}">
        <td>{{  $degrees->firstItem()+$key }}.</td>
        <td>{!! \Illuminate\Support\Str::limit($degree->title,40) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($degree->description,60) !!}</td>
        <td>{!! isset($degree->hasCreatedBy)?$degree->hasCreatedBy->name:'N/A' !!}</td>
        <td>
            @if($degree->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('degree-edit')
                <a class="btn btn-primary btn-xs" href="{{ route('degree.edit', $degree->slug) }}"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('degree-delete')
                <button class="btn btn-danger btn-xs delete" data-degree-slug="{{ $degree->slug }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$degrees->firstItem()}} to {{$degrees->lastItem()}} of {{$degrees->total()}} records
        <div class="d-flex justify-content-center">
            {!! $degrees->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
