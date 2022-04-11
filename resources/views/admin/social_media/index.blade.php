@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
	<section class="content-header">
		<div class="content-header-left">
			<h1>{{ $page_title }}</h1>
		</div>
	</section>
	<section class="content" style="min-height:auto;margin-bottom: -30px;">
		<div class="row">
			<div class="col-md-12">
				@if (session('status'))
					<div class="callout callout-success">
						{{ session('status') }}
					</div>
				@endif
			</div>
		</div>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('social_media.update', $social->id) }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					@csrf
					{{ method_field('PATCH') }}
					<div class="box box-info">
						<div class="box-body">
							<p style="padding-bottom: 20px;">If you do not want to show a social media in your front end page, just leave the input field blank.</p>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Facebook </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="facebook" value="{{$social->facebook}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Twitter </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="twitter" value="{{$social->twitter}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">LinkedIn </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="linkedin" value="{{$social->linkedin}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Google Plus </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="googleplus" value="{{$social->googleplus}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Pinterest </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="pinterest" value="{{$social->pinterest}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">YouTube </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="youtube" value="{{$social->youtube}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Instagram </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="instagram" value="{{$social->instagram}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tumblr </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="tumblr" value="{{$social->tumblr}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Flickr </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="flickr" value="{{$social->flickr}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Reddit </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="reddit" value="{{$social->reddit}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Snapchat </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="snapchat" value="{{$social->snapchat}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">WhatsApp </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="whatsapp" value="{{$social->whatsapp}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Quora </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="quora" value="{{$social->quora}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">StumbleUpon </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="stumbleupon" value="{{$social->stumbleupon}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Delicious </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="delicious" value="{{$social->delicious}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Digg </label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="digg" value="{{$social->digg}}">
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
