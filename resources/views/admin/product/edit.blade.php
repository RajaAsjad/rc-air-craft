@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Products</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('product.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="{{ route('product.update', $details->slug) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
				@csrf
				{{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Category<span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <select name="category_slug" id="category_slug" class="form-control">
                                    <option value="" selected>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}" {{ $details->category_slug == $category->slug ? 'selected':'' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first('category_slug') }}</span>
                            </div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="name" value="{{$details->name}}">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Product Price <span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="price" id="" value="{{$details->price}}" min="1" class="form-control placeholder="Enter price">
								<span style="color: red">{{ $errors->first('price') }}</span>
							</div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Min Competition<span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="min_competition" id="" value="{{$details->min_competition}}" min="1" class="form-control placeholder="Enter min competition">
								<span style="color: red">{{ $errors->first('min_competition') }}</span>
							</div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Max Competition<span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="max_competition" id="" value="{{$details->max_competition}}" min="1" max="190" class="form-control placeholder="Enter max competition">
								<span style="color: red">{{ $errors->first('max_competition') }}</span>
							</div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Number Of Winners<span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="number_of_winners" id="" value="{{$details->number_of_winners}}" min="1" max="190" class="form-control placeholder="Enter number of winners">
								<span style="color: red">{{ $errors->first('number_of_winners') }}</span>
							</div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Expiry Date <span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="draw_ends" value="{{ $details->draw_ends }}" id="end-date"  class="form-control">
                                <span id="error-end-date" style="color:red"></span>
                                <span style="color: red">{{ $errors->first('draw_ends') }}</span>
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image </label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*" name="image">
                            </div>
                            <div class="col-sm-4" >
                                <img style="width: 80px " src="{{ asset('public/admin/assets/images/product') }}/{{ $details->image }}" alt="">
                            </div>
                         </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Short Description <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="short_description" style="height:200px;" placeholder="Enter short_description">{!! $details->short_description !!}</textarea>
								<span style="color: red">{{ $errors->first('short_description') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="description" style="height:200px;" placeholder="Enter description">{!! $details->description !!}</textarea>
								<span style="color: red">{{ $errors->first('description') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Question <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="question" style="height:100px;" placeholder="Enter question">{!! isset($details->hasQuestion)?$details->hasQuestion->question:'' !!}</textarea>
								<span style="color: red">{{ $errors->first('question') }}</span>
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Answer<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" name="answer" id="" value="{!! isset($details->hasQuestion)?$details->hasQuestion->answer:'' !!}" class="form-control" placeholder="Enter answer">
                            <span style="color: red">{{ $errors->first('answer') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Option#1<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" name="choices[]" id="" value="{{ isset($details->hasQuestion->hasOptions[0])?$details->hasQuestion->hasOptions[0]->choices:'' }}" class="form-control" placeholder="Enter choices">
                            <span style="color: red">{{ $errors->first('choices') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Option#2<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" name="choices[]" id="" value="{{ isset($details->hasQuestion->hasOptions[1])?$details->hasQuestion->hasOptions[1]->choices:'' }}" class="form-control" placeholder="Enter choices">
                            <span style="color: red">{{ $errors->first('choices') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Option#3<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" name="choices[]" id="" value="{{ isset($details->hasQuestion->hasOptions[2])?$details->hasQuestion->hasOptions[2]->choices:'' }}" class="form-control" placeholder="Enter choices">
                            <span style="color: red">{{ $errors->first('choices') }}</span>
                            </div>
                        </div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" {{ $details->status==1?'selected':'' }}>Active</option>
									<option value="0" {{ $details->status==0?'selected':'' }}>In-Active</option>
								</select>
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
				name: "required",
				description: "required",
			}
		});
	});
</script>
@endpush
