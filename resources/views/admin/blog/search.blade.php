@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>
            @if($model->post)
                <img src="{{ asset('public/admin/assets/posts/'.$model->post) }}" alt="" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/posts/no-photo1.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>{{ isset($model->hasCategory)?$model->hasCategory->name:'N/A' }}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->title,40) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->description,60) !!}</td>
        <td>
            @if($model->paid_free)
                <span class="badge badge-info">Paid</span>
            @else
                <span class="badge badge-primary">Free</span>
            @endif
        </td>
        <td>
            @if($model->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>{{ date('d, F-Y H:i:s A', strtotime($model->created_at)) }}</td>
        <td width="250px">
            @can('blog-edit')
                <a href="{{route('blog.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit post" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('blog-delete')
                <a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete post" data-id="{{ $model->id }}"><i class="fa fa-trash"></i> Delete</a>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="9">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
