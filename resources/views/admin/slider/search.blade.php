@foreach($sliders as $key=>$slider)
    <tr id="id-{{ $slider->id }}">
        <td>{{  $sliders->firstItem()+$key }}.</td>
        <td style="width:150px;">
            @if($slider->left_sec_image)
                <img src="{{ asset('public/admin/assets/images/slider/'.$slider->left_sec_image) }}" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/images/slider/no-photo1.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>{{$slider->hasCreatedBy->name}}</td>
        <td>{!! \Illuminate\Support\Str::limit($slider->left_sec_title,40) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($slider->left_sec_sub_description,60) !!}</td>
        <td>
            @if($slider->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td width="250px">
            <a href="{{route('slider.show', $slider->id)}}" data-toggle="tooltip" data-placement="top" title="Show Slider" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
            @can('slider-edit')
                <a href="{{route('slider.edit', $slider->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Slider" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('slider-delete')
                <a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Slider" data-slider-id="{{ $slider->id }}"><i class="fa fa-trash"></i> Delete</a>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7">
        Displying {{$sliders->firstItem()}} to {{$sliders->lastItem()}} of {{$sliders->total()}} records
        <div class="d-flex justify-content-center">
            {!! $sliders->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
