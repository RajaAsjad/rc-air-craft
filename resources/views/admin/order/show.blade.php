@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Order Details</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('order.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table bordered">
					<tr>
						<th>Order Id</th>
						<td>
							{{ $model->order_id}}
						</td>
					</tr>
					<tr>
						<th>Product Slug</th>
						<td><span class="badge badge-success">{{ $model->product_slug }}</span></td>
					</tr>
					<tr>
						<th>Category Slug</th>
						<td>{{ $model->category_slug }}</td>
					</tr>
					<tr>
						<th>Price</th>
						<td>{{ $model->price  }}</td>
					</tr>
                    <tr>
						<th>Quantity</th>
						<td>{{ $model->quantity  }}</td>
					</tr>
                    <tr>
						<th>Discount Type</th>
						<td>{{ $model->discount_type  }}</td>
					</tr>
                    <tr>
						<th>Sub Total</th>
						<td>{{ $model->sub_total  }}</td>
					</tr>
                    <tr>
						<th>Order Status</th>
						<td>{{ $model->order_status  }}</td>
					</tr>
                    <tr>
						<th>Order Date</th>
						<td>{{ $model->order_date  }}</td>
					</tr>

					<tr>
						<th>Status</th>
						<td>
							@if($model->status)
								<span class="badge badge-success">Active</span>
							@else
								<span class="badge badge-danger">In-Active</span>
							@endif
						</td>
					</tr>
					{{-- <tr>
						<th>Date</th>
						<td>
							<span class="badge badge-success">{{ date('d, F-Y H:i:s A', strtotime($service->created_at)) }}</span>
						</td>
					</tr> --}}
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('.editor_short').summernote({
			height: 150
		});
	});
</script>
@endsection
