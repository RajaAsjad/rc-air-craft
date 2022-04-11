@foreach($testimonials as $key=>$testimonial)
    <tr id="id-{{ $testimonial->slug }}">
        <td>{{ $testimonials->firstItem()+$key }}.</td>
        <td>
            @if($testimonial->image)
                <img src="{{ asset('public/admin/assets/images/testimonials/'.$testimonial->image) }}" alt="" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/images/testimonials/no-photo1.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>{!! $testimonial->name !!}</td>
        <td>{!! $testimonial->designation !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($testimonial->comment,60) !!}</td>
        <td>
            @can('testimonial-edit')
                <a href="{{route('testimonial.edit', $testimonial->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit testimonial" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('testimonial-delete')
                <a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete testimonial" data-testimonial-slug="{{ $testimonial->slug }}"><i class="fa fa-trash"></i> Delete</a>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$testimonials->firstItem()}} to {{$testimonials->lastItem()}} of {{$testimonials->total()}} records
        <div class="d-flex justify-content-center">
            {!! $testimonials->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
