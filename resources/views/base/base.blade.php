<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyMath.io</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex h-screen flex-col">
        @include('nav.navbar')
        @yield('content')
    </div>
    @vite('resources/js/app.js')
    @yield('scripts')
</body>

</html>