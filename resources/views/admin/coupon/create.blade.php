@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Coupon</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('coupon.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('coupon.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title">
								<span style="color: red">{{ $errors->first('title') }}</span>
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Coupon Type <span style="color: red">*</span></label>
                           <div class="col-md-9">
                                <select name="coupon_type" id="coupon_type" class="form-control">
                                    <option value="" selected>Select coupon type</option>
                                    <option value="fix" {{ old('coupon_type') == 'fix' ? 'selected':'' }}>Fix Discount</option>
                                    <option value="percent" {{ old('coupon_type')=='percent'?'selected':'' }}>Percent Discount</option>
                                </select>
                                <span style="color: red">{{ $errors->first('coupon_type') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Discount <span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="discount" value="{{ old('discount') }}" id="discount" class="form-control" placeholder="Enter discount">
                                <span style="color: red">{{ $errors->first('discount') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Coupon Code <span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="coupon_code" value="{{ old('coupon_code') }}" id="coupon_code" class="form-control" placeholder="Auto generate coupon code" readonly>
                                <span style="color: red">{{ $errors->first('coupon_code') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Max Purchase <span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="max_purchase" id="" value="{{ old('max_purchase') }}" min="1" class="form-control">
                                <span id="error-end-date" style="color:red"></span>
                                <span style="color: red">{{ $errors->first('max_purchase') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Start Date<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="start_date" value="{{ old('start_date') }}" min="{{ date('Y-m-d') }}" id="start-date" class="form-control">
                                <span id="error-start-date" style="color:red"></span>
                                <span style="color: red">{{ $errors->first('start_date') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Expire Date<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="expire_date" value="{{ old('expire_date') }}" id="end-date" min="{{ date('Y-m-d') }}" class="form-control">
                                <span id="error-end-date" style="color:red"></span>
                                <span style="color: red">{{ $errors->first('expire_date') }}</span>
                            </div>
                        </div>
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
				title: "required",
			}
		});
	});
</script>
@endpush
