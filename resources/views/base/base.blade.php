<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyMath.io</title>
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app" class="h-screen flex flex-col items-center p-20">
        @yield('content')
    </div>
    @vite('resources/js/app.js')
    @yield('scripts')
</body>

</html>