<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{config('app.name')}}</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<link href="css/datepicker.css" rel="stylesheet" type="text/css"/>

	<link href="{{ asset('css/holyMother.css') }}" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{{--	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">--}}
{{--	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">--}}

{{--	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>--}}
{{--	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>--}}
{{--	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>--}}

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
</head>
<body style="background: #2C2C28; color: white; font-family: ubuntu;">
<!-- <div id="app"> -->

	@include('include.navbar')
	<div class="container">
		<br>
		@include('include.message')
		@yield('system')
	</div>

<section>

{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/jquery-ui-1.10.4.min.js') !!}
{!! Html::script('js/jquery-1.8.3.min.js') !!}
{!! Html::script('js/jquery-ui-1.9.2.custom.min.js') !!}
<!-- bootstrap -->
{!! Html::script('js/bootstrap.min.js') !!}
<!-- nice scroll -->
{{--{!! Html::script('js/jquery.scrollTo.min.js') !!}--}}
{{--{!! Html::script('js/jquery.nicescroll.js') !!}--}}
{{--<!-- charts scripts -->--}}
{{--{!! Html::script('assets/jquery-knob/js/jquery.knob.js') !!}--}}
{{--{!! Html::script('js/jquery.sparkline.js') !!}--}}
{{--{!! Html::script('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') !!}--}}
{{--{!! Html::script('js/owl.carousel.js') !!}--}}
<!-- jQuery full calendar -->
{{--	<script src="{{ asset('js/fullcalendar.js') }}" defer></script>--}}
{{--	<script src="{{ asset('js/fullcalendar.min.js') }}" defer></script>--}}
{{--	<script src="{{ asset('js/calendar-custom.js') }}" defer></script>--}}
{{--	<script src="{{ asset('js/owl.carousel.js') }}" defer></script>--}}
{{--{!! Html::script('assets/fullcalendar/fullcalendar/fullcalendar.js') !!}--}}
<!--script for this page only-->
{{--{!! Html::script('js/calendar-custom.js') !!}--}}
{{--{!! Html::script('js/jquery.rateit.min.js') !!}--}}
{{--<!-- custom select -->--}}
{{--{!! Html::script('js/jquery.customSelect.min.js') !!}--}}
{{--{!! Html::script('assets/chart-master/Chart.js') !!}--}}

{{--<!--custome script for all page-->--}}
{{--{!! Html::script('js/scripts.js') !!}--}}
{{--<!-- custom script for this page-->--}}
{{--{!! Html::script('js/sparkline-chart.js') !!}--}}
{{--{!! Html::script('js/easy-pie-chart.js') !!}--}}
{{--{!! Html::script('js/jquery-jvectormap-1.2.2.min.js') !!}--}}
{{--{!! Html::script('js/jquery-jvectormap-world-mill-en.js') !!}--}}
{{--{!! Html::script('js/xcharts.min.js') !!}--}}
{{--{!! Html::script('js/jquery.autosize.min.js') !!}--}}
{{--{!! Html::script('js/jquery.placeholder.min.js') !!}--}}
{{--{!! Html::script('js/gdp-data.js') !!}--}}
{{--{!! Html::script('js/morris.min.js') !!}--}}
{{--{!! Html::script('js/sparklines.js') !!}--}}
{{--{!! Html::script('js/charts.js') !!}--}}
{{--{!! Html::script('js/jquery.slimscroll.min.js') !!}--}}
{{--<!-- JS data table -->--}}
{{--	{!! Html::script('js/jquery.dataTables.min.js') !!}--}}
{{--	{!! Html::script('js/dataTables.buttons.min.js') !!}--}}
{{--	{!! Html::script('js/jszip.min.js') !!}--}}
{{--	{!! Html::script('js/pdfmake.min.js') !!}--}}
{{--	{!! Html::script('js/vfs_fonts.js') !!}--}}
{{--	{!! Html::script('js/buttons.html5.min.js') !!}--}}

	@yield('script')
</section>

<script>
	$(document).ready(function() {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		});
	});

</script>

	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
	</script>
<!-- </div> -->
</body>
</html>