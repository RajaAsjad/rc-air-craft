@foreach($models as $key=>$model)
<tr id="id-{{ $model->slug }}">
    <td>{{ $models->firstItem()+$key }}.</td>
    <td>{!! \Illuminate\Support\Str::limit($model->title,40) !!}</td>
    <td>{!! \Illuminate\Support\Str::limit($model->max_purchase,40) !!}</td>
    <td>{!! \Illuminate\Support\Str::limit($model->discount,60) !!}</td>
    <td>{!! \Illuminate\Support\Str::limit($model->coupon_code,60) !!}</td>
    <td>{!! \Illuminate\Support\Str::limit($model->start_date,40) !!}</td>
    <td>{!! \Illuminate\Support\Str::limit($model->expire_date,60) !!}</td>
    <td>
        @if($model->status)
            <span class="badge badge-success">Active</span>
        @else
            <span class="badge badge-danger">In-Active</span>
        @endif
    </td>
    <td>
        @can('coupon-edit')
            <a href="{{route('coupon.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
        @endcan
        @can('coupon-delete')
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->slug }}" data-del-url="{{ url('coupon', $model->slug) }}"><i class="fa fa-trash"></i> Delete</button>
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
