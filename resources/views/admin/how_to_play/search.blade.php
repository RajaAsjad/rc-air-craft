@foreach($models as $key=>$model)
<tr id="id-{{ $model->id }}">
    <td>{{ $models->firstItem()+$key }}.</td>
    <td>
        @if($model->image)
            <img src="{{ asset('public/admin/assets/images/howToPlay/'.$model->image) }}" alt="" style="width:60px;">
        @else
            <img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
        @endif
    </td>
    <td>{{\Illuminate\Support\Str::limit($model->title,60)}}</td>
    <td>{{\Illuminate\Support\Str::limit($model->description,60)}}</td>
    <td>
        @if($model->status)
            <span class="badge badge-success">Active</span>
        @else
            <span class="badge badge-danger">In-Active</span>
        @endif
    </td>
    <td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
    <td width="250px">
        @can('how_to_play-edit')
            <a href="{{route('how_to_play.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit how_to_play" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
        @endcan
        @can('how_to_play-delete')
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('how_to_play', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
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
