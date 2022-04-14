@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Faqs</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('faq.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('faq.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Question<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="question" style="height:140px;" placeholder="Enter question"></textarea>
								<span style="color: red">{{ $errors->first('question') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Answer<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="answer" style="height:140px;" placeholder="Enter answer"></textarea>
								<span style="color: red">{{ $errors->first('answer') }}</span>
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
				question: "required"
                answer: "required"
			}
		});
	});
</script>
@endpush
