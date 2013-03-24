<!DOCTYPE HTML>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <title>ModernHome.in :: Live Modern Life @if(isset($title)) {{ $title }} @endif </title>
    </head>
    <body>
    	{{ Session::get('status') }}
        @yield('content')
    </body>
</html>