@foreach($languages as $key=>$language)
    <tr id="id-{{ $language->slug }}">
        <td>{{  $languages->firstItem()+$key }}.</td>
        <td>{{ $language->title }}</td>
        <td>{{ $language->code }}</td>
        <td>{!! $language->description !!}</td>
        <td>
            @if($language->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('language-edit')
                <a class="btn btn-primary btn-xs" href="{{ route('language.edit', $language->slug) }}"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('language-delete')
                <button class="btn btn-danger btn-xs delete" data-language-slug="{{ $language->slug }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$languages->firstItem()}} to {{$languages->lastItem()}} of {{$languages->total()}} records
        <div class="d-flex justify-content-center">
            {!! $languages->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
