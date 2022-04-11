@foreach($courses as $key=>$course)
    <tr id="id-{{ $course->slug }}">
        <td>{{  $courses->firstItem()+$key }}.</td>
        <td>{{ isset($course->hasDegree)?$course->hasDegree->title:'N/A' }}</td>
        <td>{!! \Illuminate\Support\Str::limit($course->title,40) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($course->description,60) !!}</td>
        <td>
            @if($course->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('course-edit')
                <a class="btn btn-primary btn-xs" href="{{ route('course.edit', $course->slug) }}"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('course-delete')
                <button class="btn btn-danger btn-xs delete" data-course-slug="{{ $course->slug }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$courses->firstItem()}} to {{$courses->lastItem()}} of {{$courses->total()}} records
        <div class="d-flex justify-content-center">
            {!! $courses->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
