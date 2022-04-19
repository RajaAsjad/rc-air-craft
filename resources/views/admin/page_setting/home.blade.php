@extends('layouts.admin.app')
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Page Setting of <strong>{{ $model->title }}</strong></h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('message'))
				<div class="callout callout-success">
					{{ session('message') }}
				</div>
			@endif

			<div class="box box-info">
				<div class="box-body">
					<h3 class="sec_title">Banner Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Banner Heading </label>
							<div class="col-sm-6">
								<input type="text" name="banner_heading" class="form-control" value="{{ isset($page_data['banner_heading'])?$page_data['banner_heading']:'' }}" placeholder="Enter banner heading">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Background Image </label>
							<div class="col-sm-6">
								<input type="file" name="banner_bg_image" class="form-control">
							</div>

                            @if(isset($page_data['banner_bg_image']))
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('/public/admin/assets/images/page/'.$page_data['banner_bg_image']) }}" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            @endif
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
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
				title: "required"
			}
		});
	});
</script>
@endpush
