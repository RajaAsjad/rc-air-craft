@extends('layouts.admin.app')
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1><strong>{{ $model->title }}</strong></h1>
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
			<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Favicon </label>
                            <div class="col-sm-6">
                                <input type="file" name="header_favicon" class="form-control">
                            </div>
                            @if(isset($page_data['header_favicon']))
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('/public/admin/assets/images/page/'.$page_data['header_favicon']) }}" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Logo </label>
                            <div class="col-sm-6">
                                <input type="file" name="header_logo" class="form-control">
                            </div>
                            @if(isset($page_data['header_logo']))
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('/public/admin/assets/images/page/'.$page_data['header_logo']) }}" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            @endif
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_blog">Submit</button>
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
@endpush
