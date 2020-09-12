<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Grytte Organization</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ab5aaa571c.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">
</head>
<body>
    @if (Request::path() != '/')
        @include('layouts.navbar')
    @endif
    @include('layouts.messages')
    @yield('content')
    @include('layouts.footer')
</body>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script type="text/javascript">
	$("#main-menu").click(function() {
		$("#main-menu-dropdown").toggleClass("opacity-100 scale-100 hidden duration-150 ease-out");
        $("#main-menu").toggleClass("hidden");
	});
    $("#close-main-menu").click(function() {
        $("#main-menu-dropdown").toggleClass("opacity-0 scale-95 hidden duration-100 ease-in");
        $("#main-menu").toggleClass("hidden");
	});
</script>
</html>
