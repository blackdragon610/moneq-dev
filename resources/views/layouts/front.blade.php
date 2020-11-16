<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="0">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="css/app.css">
        <title></title>

        @if (env("APP_DEBUG"))
            <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
        @endif
	</head>

	<body>
		@include('layouts.parts.header')
        @yield('main')
		@include('layouts.parts.footer')
	</body>
</html>
