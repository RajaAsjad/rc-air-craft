@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Slider</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('slider.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('slider.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title">
								<span style="color: red">{{ $errors->first('title') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:140px;" placeholder="Enter description"></textarea>
								<span style="color: red">{{ $errors->first('description') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Image <span style="color: red">*</span></label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*"  name="image" id="image">
                                <span style="color: red">{{ $errors->first('image') }}</span>
                            </div>
                            <div class="col-sm-4" >
                                    <img style="width: 80px" id="banner_preview"  src="{{ asset('public/admin/assets/images/default.jpg') }}"  alt="Image Not Found ">
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
@push('js')
<script>
	$(document).ready(function() {
		$("#regform").validate({
			rules: {
				/* title: "required"
                description: "required" */
			}
		});
	});
</script>
@endpush
