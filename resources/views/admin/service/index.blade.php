@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('service.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All services</h1>
	</div>
	@can('service-create')
	<div class="content-header-right">
		<a href="{{ route('service.create') }}" class="btn btn-primary btn-sm">Add service</a>
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
								<th>Name</th>
								<th>Description</th>
								<th>Created by</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($services as $key=>$service)
								<tr id="id-{{ $service->slug }}">
									<td>{{  $services->firstItem()+$key }}.</td>
									<td>{!! \Illuminate\Support\Str::limit($service->name,40) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($service->description,60) !!}</td>
									<td>{!! isset($service->hasCreatedBy)?$service->hasCreatedBy->name:'N/A' !!}</td>
									<td>
										@if($service->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										<a href="{{route('service.show', $service->slug)}}" data-toggle="tooltip" data-placement="top" title="Show service" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
										@can('service-edit')
											<a href="{{route('service.edit', $service->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit service" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('service-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $service->slug }}" data-del-url="{{ url('service', $service->slug) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="6">
									Displying {{$services->firstItem()}} to {{$services->lastItem()}} of {{$services->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $services->links('pagination::bootstrap-4') !!}
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
