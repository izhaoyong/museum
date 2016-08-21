<!DOCTYPE html>
<html lang="ZH-ch">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>北京语言文化博物馆</title>

	<link rel="stylesheet" href="{{ asset('/css/reset.css')}}" >
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}" >

	<script src="{{ asset('/js/jquery-2.1.4.min.js')}}"></script>
	<script src="{{ asset('/js/image.js')}}"></script>
	<script src="{{ asset('/js/sound.js')}}" ></script>
	<script src="{{ asset('/js/pdf.js')}}"></script>
	<script src="{{ asset('/js/jquery.lazyload.min.js')}}"></script>
	<script src="{{ asset('/js/layzr.min.js')}}"></script>
	<script src="{{ asset('/js/echo.min.js')}}"></script>

</head>
<body>
   	@yield('content')
	<script src="{{ asset('/js/main1.js')}}" ></script>	
	<script src="{{ asset('/js/bootstrap.js')}}"></script>
</body>
</html>
