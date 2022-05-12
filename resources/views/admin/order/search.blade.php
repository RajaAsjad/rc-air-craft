@foreach($models as $key=>$model)
<tr id="id-{{ $model->slug }}">
    <td>{{ $models->firstItem()+$key }}.</td>

    <td>{{\Illuminate\Support\Str::limit($model->order_id,40)}}</td>
    <td>{{\Illuminate\Support\Str::limit($model->product_slug,60)}}</td>
    <td>{{\Illuminate\Support\Str::limit($model->category_slug,60)}}</td>
    <td>
        @if($model->status)
            <span class="badge badge-success">Active</span>
        @else
            <span class="badge badge-danger">In-Active</span>
        @endif
    </td>
    <td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
    <td width="250px">
        <a href="{{route('order.show', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Show order" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>

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
