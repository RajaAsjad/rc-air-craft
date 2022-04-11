@foreach($booking_types as $key=>$booking_type)
    <tr id="id-{{ $booking_type->slug }}">
        <td>{{  $booking_types->firstItem()+$key }}.</td>
        <td>{!! \Illuminate\Support\Str::limit($booking_type->title,40) !!}</td>
        <td>{{ Str::upper($booking_type->type) }}</td>
        <td><span class="dot" style="background: {{ $booking_type->color }}"></span></td>
        <td>{{ $booking_type->credits }}</td>
        <td>{{ number_format($booking_type->price, 2) }}</td>
        <td>{{ $booking_type->currency_code }}</td>
        <td>{!! \Illuminate\Support\Str::limit($booking_type->description,60) !!}</td>
        <td>
            @if($booking_type->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('booking_type-edit')
                <a class="btn btn-primary btn-xs" href="{{ route('booking_type.edit', $booking_type->slug) }}"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('booking_type-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $booking_type->slug }}" data-del-url="{{ url('booking_type', $booking_type->slug) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$booking_types->firstItem()}} to {{$booking_types->lastItem()}} of {{$booking_types->total()}} records
        <div class="d-flex justify-content-center">
            {!! $booking_types->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>