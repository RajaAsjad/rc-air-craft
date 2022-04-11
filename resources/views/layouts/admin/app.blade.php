<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="csrf-token" id="token" content="{{ csrf_token() }}" />

		<link rel="stylesheet" href="{{asset('public/admin/assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/ionicons.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/datepicker3.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/all.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/select2.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/dataTables.bootstrap.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/jquery.fancybox.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/AdminLTE.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/_all-skins.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/summernote.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/style.css')}}">
		<link rel="stylesheet" href="{{asset('public/admin/assets/css/toastr.min.css')}}">

		<style>
			.skin-blue .wrapper,
			.skin-blue .main-header .logo,
			.skin-blue .main-header .navbar,
			.skin-blue .main-sidebar,
			.content-header .content-header-right a,
			.content .form-horizontal .btn-success {
				background-color: #4172a5 !important;
			}

			.content-header .content-header-right a,
			.content .form-horizontal .btn-success {
				border-color: #4172a5 !important;
			}

			.content-header>h1,
			.content-header .content-header-left h1,
			h3 {
				color: #4172a5 !important;
			}

			.box.box-info {
				border-top-color: #4172a5 !important;
			}

			.nav-tabs-custom>.nav-tabs>li.active {
				border-top-color: #f4f4f4 !important;
			}

			.skin-blue .sidebar a {
				color: #fff !important;
			}

			.skin-blue .sidebar-menu>li>.treeview-menu {
				margin: 0 !important;
			}

			.skin-blue .sidebar-menu>li>a {
				border-left: 0 !important;
			}

			.nav-tabs-custom>.nav-tabs>li {
				border-top-width: 1px !important;
			}

			label.error {
				color: #dc3545;
				font-size: 14px;
			}
		</style>

		@stack('css')
	</head>

	<body class="hold-transition fixed skin-blue sidebar-mini">
		<div class="wrapper">
			<!--header-->
			@include('layouts.admin.header')

			<!--sidebar-->
			@include('layouts.admin.sidebar')

			<div class="content-wrapper">
				@yield('content')
			</div>
		</div>
	</body>

	<!-- Script -->
	<script src="{{asset('public/admin/assets/js/jquery-2.2.4.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/select2.full.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jscolor.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.inputmask.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.inputmask.date.extensions.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.inputmask.extensions.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/moment.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/icheck.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/fastclick.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.fancybox.pack.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/app.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/summernote.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/demo.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/tinymce/tinymce.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/jquery.validate.min.js')}}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{asset('public/admin/assets/js/toastr.min.js')}}"></script>
	<script src="{{asset('public/admin/assets/js/search.js')}}"></script>
	<script>
		@if(Session::has('message'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.success("{{ session('message') }}");
		@endif

		@if(Session::has('error'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.error("{{ session('error') }}");
		@endif

		@if(Session::has('info'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.info("{{ session('info') }}");
		@endif

		@if(Session::has('warning'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.warning("{{ session('warning') }}");
		@endif
	</script>
	@stack('js')
</html>
