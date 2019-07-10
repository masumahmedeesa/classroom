<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<title>{{config('app.name')}}</title>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
</head>
<body style="background: #2C2C28; color: white; font-family: ubuntu; ">
    
    
	<div class="container">
		<br>
		@yield('special')
	</div>	
</body>
</html>