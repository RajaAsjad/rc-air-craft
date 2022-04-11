@foreach($users as $key=>$user)
    @if($user->hasRole('Admin'))
        @continue;
    @endif
    <tr id="id-{{ $user->id }}">
        <td>{{  $users->firstItem()+$key }}.</td>
        <td>{{$user->name}}</td>
        <td>{{$user->last_name??'N/A'}}</td>
        <td>{{$user->phone??'N/A'}}</td>
        <td>{{$user->email}}</td>
        <td>
            @if($user->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('user-edit')
                <a href="{{ route('user.edit', $user->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('user-delete')
                <a class="btn btn-danger btn-xs delete-btn" data-user-id="{{ $user->id }}"><i class="fa fa-trash"></i> Delete</a>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7">
        Displying {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} records
        <div class="d-flex justify-content-center">
            {!! $users->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
