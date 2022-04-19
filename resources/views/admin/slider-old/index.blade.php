@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('slider.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Sliders</h1>
	</div>
	@can('slider-create')
	<div class="content-header-right">
		<a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">Add Slider</a>
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
								<th>SL</th>
								<th>Image</th>
								<th>Created by</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
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
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $slider->id }}" data-del-url="{{ url('slider', $slider->id) }}"><i class="fa fa-trash"></i> Delete</button>
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
