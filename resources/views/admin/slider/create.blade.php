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
						<fieldset>
							<legend>Left Section</legend>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Image <span style="color:red">*</span></label>
								<div class="col-sm-9" style="padding-top:5px">
									<input type="file" name="left_sec_image" accept="image/*">(Only jpg, jpeg, gif and png are allowed) <br />
									<span style="color: red">{{ $errors->first('image') }}</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-9">
									<input type="text" autocomplete="off" class="form-control" name="left_sec_title" value="" placeholder="Enter slider title">
									<span style="color: red">{{ $errors->first('left_sec_title') }}</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Sub Description </label>
								<div class="col-sm-9">
									<textarea class="form-control" name="left_sec_sub_description" style="height:140px;" placeholder="Enter sub description"></textarea>
									<span style="color: red">{{ $errors->first('left_sec_sub_description') }}</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Description </label>
								<div class="col-sm-9">
									<textarea class="form-control texteditor" name="left_sec_description" style="height:140px;" placeholder="Enter description"></textarea>
									<span style="color: red">{{ $errors->first('left_sec_description') }}</span>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Right Section</legend>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-9">
									<input type="text" autocomplete="off" class="form-control" name="right_sect_title" value="" placeholder="Enter slider title">
									<span style="color: red">{{ $errors->first('right_sect_title') }}</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Description </label>
								<div class="col-sm-9">
									<textarea class="form-control" name="right_sec_description" style="height:140px;" placeholder="Enter description"></textarea>
									<span style="color: red">{{ $errors->first('description') }}</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Left Button Label </label>
								<div class="col-sm-9">
									<input type="text" autocomplete="off" class="form-control" name="right_sec_left_btn_lbl" value="" placeholder="Enter slider title">
									<span style="color: red">{{ $errors->first('right_sec_left_btn_lbl') }}</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Right Button Label </label>
								<div class="col-sm-9">
									<input type="text" autocomplete="off" class="form-control" name="right_sec_right_btn_lbl" value="" placeholder="Enter slider title">
									<span style="color: red">{{ $errors->first('right_sec_right_btn_lbl') }}</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Video Link </label>
								<div class="col-sm-9" style="padding-top:5px">
									<input type="text" autocomplete="off" class="form-control" name="right_sec_video_link" value="" placeholder="Enter video link here...">
									<span style="color: red">{{ $errors->first('right_sec_video_link') }}</span>
								</div>
							</div>
						</fieldset>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-9">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
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
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}

		$("#regform").validate({
			rules: {
				image: "required",
			}
		});
	});
</script>
@endpush
