<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RC Air Craft</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/datepicker3.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/dataTables.bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/_all-skins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/toastr.min.css')}}">
    <link rel="icon" href="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_favicon'] }}" type="image/png" sizes="16x16">

	<style>
		.login-page {
			background: #333;
		}
		.login-logo {
			color: #fff;
		}
	</style>

</head>

<body class="hold-transition login-page sidebar-mini">

@yield('content')

<script src="{{ asset('public/admin/assets/js/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.inputmask.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/icheck.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/app.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/demo.js') }}"></script>
<script src="{{asset('public/admin/assets/js/toastr.min.js')}}"></script>
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
</body>
</html>
