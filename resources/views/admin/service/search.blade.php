@foreach($services as $key=>$service)
    <tr id="id-{{ $service->slug }}">
        <td>{{  $services->firstItem()+$key }}.</td>
        <td>{!! \Illuminate\Support\Str::limit($service->name,40) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($service->description,60) !!}</td>
        <td>{!! isset($service->hasCreatedBy)?$service->hasCreatedBy->name:'N/A' !!}</td>
        <td>
            @if($service->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td width="250px">
            <a href="{{route('service.show', $service->slug)}}" data-toggle="tooltip" data-placement="top" title="Show service" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
            @can('service-edit')
                <a href="{{route('service.edit', $service->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit service" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('service-delete')
                <a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete service" data-service-slug="{{ $service->slug }}"><i class="fa fa-trash"></i> Delete</a>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$services->firstItem()}} to {{$services->lastItem()}} of {{$services->total()}} records
        <div class="d-flex justify-content-center">
            {!! $services->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
