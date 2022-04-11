@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('testimonial.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Testimonials</h1>
	</div>
	@can('testimonial-create')
	<div class="content-header-right">
		<a href="{{ route('testimonial.create') }}" class="btn btn-primary btn-sm">Add Testimonial</a>
	</div>
	@endcan
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
				</div>
			@endif

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
								<th width="30">SL</th>
								<th>Image</th>
								<th>Name</th>
								<th>Designation</th>
								<th>Comment</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="body">
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
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $testimonial->slug }}" data-del-url="{{ url('testimonial', $testimonial->slug) }}"><i class="fa fa-trash"></i> Delete</button>
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
