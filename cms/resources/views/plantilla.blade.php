<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Informe Orca | CMS</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="vistas/img/ball.png">
	<!--=====================================
	PLUGINS DE CSS
	======================================-->

	{{-- BOOTSTRAP 4 --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	{{-- OverlayScrollbars.min.css --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/OverlayScrollbars.min.css">

	{{-- TAGS INPUT --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/tagsinput.css">

	{{-- SUMMERNOTE --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/summernote.css">

	{{-- NOTIE --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/notie.css">
	

	{{-- CSS AdminLTE --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/adminlte.min.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/responsive.bootstrap.min.css">
	
	{{-- google fonts --}}
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	{{-- CSS adminlte.css .::login::.--}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/adminlte.css">

	<!-- daterange picker fecha filtro-->
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/daterangepicker/daterangepicker.css">

	{{--libreria picker date range bootstrap4 css--}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
	
	<!--=====================================
	PLUGINS DE JS
	======================================-->
   
	{{-- Fontawesome --}}
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	{{-- jquery.overlayScrollbars.min.js --}}
	<script src="{{ url('/') }}/js/plugins/jquery.overlayScrollbars.min.js"></script>

	{{-- TAGS INPUT --}}
	{{-- https://www.jqueryscript.net/form/Bootstrap-4-Tag-Input-Plugin-jQuery.html --}}
	<script src="{{ url('/') }}/js/plugins/tagsinput.js"></script>

	{{-- SUMMERNOTE --}}
	{{-- https://summernote.org/ --}}
	<script src="{{ url('/') }}/js/plugins/summernote.js"></script>

	{{-- NOTIE --}}
	{{-- https://github.com/jaredreich/notie --}}
	<script src="{{ url('/') }}/js/plugins/notie.js"></script>
	

	{{-- SWEET ALERT --}}
	{{-- https://sweetalert2.github.io/ --}}
	<script src="{{ url('/') }}/js/plugins/sweetalert.js"></script>
	
    <!-- DataTables 
	https://datatables.net/-->
	<script src="{{ url('/') }}/js/plugins/jquery.dataTables.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="{{ url('/') }}/js/plugins/dataTables.responsive.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/responsive.bootstrap.min.js"></script>
	
	{{-- JS AdminLTE --}}
	<script src="{{ url('/') }}/js/plugins/adminlte.js"></script>

	<!-- date-range-picker-no funciona -->
   	<script src="{{ url('/') }}/js/plugins/moment/moment.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/daterangepicker/daterangepicker.js"></script>

	{{--Js picker rango de fecha bootstrap4--}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

	{{-- JS chart.js --}}
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	
	{{--Highchar Js--}}
	
	<script src="https://code.highcharts.com/highcharts.js"></script>
	

</head>

@if (Route::has('login'))
@auth

<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">

	<div class="wrapper">

        @include('modulos.header')
        
        @include('modulos.sidebar')		

		@yield('content')

		@include('modulos.footer')


	</div>

<input type="hidden" id="ruta" value="{{url('/')}}">

<script src="{{url('/')}}/js/codigo.js"></script>
<script src="{{url('/')}}/js/multi.js"></script>
<script src="{{url('/')}}/js/aqua.js"></script>
<script src="{{url('/')}}/js/austral.js"></script>
<script src="{{url('/')}}/js/aysen.js"></script>
<script src="{{url('/')}}/js/centrostotales.js"></script>


</body>

@else

@include('paginas.login')



@endauth

@endif

</html>