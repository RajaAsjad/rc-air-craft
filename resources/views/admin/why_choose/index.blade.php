@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('why_choose.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</h1>
	</div>
	@can('why_choose-create')
	<div class="content-header-right">
		<a href="{{ route('why_choose.create') }}" class="btn btn-primary btn-sm">Add New</a>
	</div>
	@endcan
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
	<div class="row">
		<div class="col-md-12">
			@if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
				</div>
			@endif
		</div>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Image</th>
								<th>Icon</th>
								<th>Name</th>
								<th>Content</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($whychooses as $key=>$whychoose)
                                <tr id="id-{{ $whychoose->id }}">
                                    <td>{{ $whychooses->firstItem()+$key }}.</td>
                                    <td>
                                        @if($whychoose->image)
                                            <img src="{{ asset('public/admin/assets/images/why_choose/'.$whychoose->image) }}" alt="" style="width:60px; height:40px">
                                        @else
                                            <img src="{{ asset('public/admin/assets/images/why_choose/no-photo1.jpg') }}" alt="" style="width:60px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if($whychoose->icon)
                                            <img src="{{ asset('public/admin/assets/images/why_choose/'.$whychoose->icon) }}" alt="" style="width:60px; height:40px">
                                        @else
                                            <img src="{{ asset('public/admin/assets/images/why_choose/no-photo1.jpg') }}" alt="" style="width:60px;">
                                        @endif
                                    </td>
                                    <td>{!! \Illuminate\Support\Str::limit($whychoose->name,40) !!}</td>
                                    <td>{!! \Illuminate\Support\Str::limit($whychoose->content,60) !!}</td>
                                    <td>
                                        @if($whychoose->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td width="200px">
                                        @can('why_choose-edit')
                                            <a href="{{ route('why_choose.edit', $whychoose->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('why_choose-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $whychoose->id }}" data-del-url="{{ url('why_choose', $whychoose->id) }}"><i class="fa fa-trash"></i> Delete</button>
                                        @endcan
                                    </td>
                                </tr>
							@endforeach
                            <tr>
                                <td colspan="5">
                                    Displying {{$whychooses->firstItem()}} to {{$whychooses->lastItem()}} of {{$whychooses->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $whychooses->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('js')
@endpush
