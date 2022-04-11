@extends('layouts.admin.app')
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Service Details</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('service.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<table class="table bordered">
						<tr>
							<th>Name</th>
							<td><span class="badge badge-success">{{ $service->name }}</span></td>
						</tr>
						<tr>
							<th>Description</th>
							<td>{!! $service->description !!}</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								@if($service->status)
									<span class="badge badge-success">Active</span>
								@else 
									<span class="badge badge-danger">In-Active</span>
								@endif
							</td>
						</tr>
						<tr>
							<th>Date</th>
							<td>
								<span class="badge badge-success">{{ date('d, F-Y H:i:s A', strtotime($service->created_at)) }}</span>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection