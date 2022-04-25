@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>
            @if($model->image)
                <img src="{{ asset('public/admin/assets/images/about_us/'.$model->image) }}" alt="" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>{{\Illuminate\Support\Str::limit($model->heading??'N/A',60)}}</td>
        <td>{{\Illuminate\Support\Str::limit($model->description??'N/A',60)}}</td>
        <td>
            @if($model->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
        <td width="250px">
            @can('about_us-edit')
                <a href="{{route('about_us.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit AboutUs" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('about_us-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('about_us', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
