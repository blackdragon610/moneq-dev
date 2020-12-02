<!DOCTYPE html>
<html lang="ja">
	<head>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="0">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/test.css">
		<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.cookie.js"></script>
        <script src="/js/bootstrap/bootstrap-tagsinput.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

		<link rel="icon" href="/images/svg/logo.svg" type = "image/x-icon">
		<title>MoneQ</title>

        @if (env("APP_DEBUG"))
            <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
        @endif
	</head>

	<body class="whitepanel">
		@include('layouts.parts.header')
		@yield('main')
		@include('layouts.parts.footer')
	</body>
</html>
