@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Slider Details</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('slider.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table bordered">
					<fieldset>
						<legend>Left Section</legend>
						<tr>
							<th width="200px">Image</th>
							<td>
								@if($slider->left_sec_image)
									<img src="{{ asset('public/admin/assets/images/slider') }}/{{ $slider->left_sec_image }}" alt="Slider Image" height="400px" width="500px">
								@else
									<img src="{{ asset('public/admin/assets/images/slider/no-photo1.jpg') }}" alt="Slider Image" height="400px" width="500px">
								@endif
							</td>
						</tr>
						<tr>
							<th>Title</th>
							<td><span class="badge badge-success">{!! $slider->left_sec_title !!}</span></td>
						</tr>
						<tr>
							<th>Sub Description</th>
							<td>{!! $slider->left_sec_sub_description !!}</td>
						</tr>
						<tr>
							<th>Description</th>
							<td>{!! $slider->left_sec_description !!}</td>
						</tr>
					</fieldset>
				</table>
				<table class="table bordered">
					<fieldset>
						<legend>Right Section</legend>
						<tr>
							<th width="200px">Title</th>
							<td><span class="badge badge-success">{!! $slider->right_sect_title !!}</span></td>
						</tr>
						<tr>
							<th>Description</th>
							<td>{!! $slider->right_sec_description !!}</td>
						</tr>
						<tr>
							<th>Left Button Label</th>
							<td>{!! $slider->right_sec_left_btn_lbl !!}</td>
						</tr>
						<tr>
							<th>Right Button Label</th>
							<td>{!! $slider->right_sec_right_btn_lbl !!}</td>
						</tr>
						<tr>
							<th>Video Link</th>
							<td>{!! $slider->right_sec_video_link !!}</td>
						</tr>
					</fieldset>

					<tr>
						<th>Status</th>
						<td>
							@if($slider->status)
								<span class="badge badge-success">Active</span>
							@else
								<span class="badge badge-danger">In-Active</span>
							@endif
						</td>
					</tr>
					<tr>
						<th>Date</th>
						<td>
							<span class="badge badge-success">{{ date('d, F-Y H:i:s A', strtotime($slider->created_at)) }}</span>
						</td>
					</tr>
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
