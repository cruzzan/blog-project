<!DOCTYPE html>
<html lang="se">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Some sort of blog</title>
        <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/static/images/ssob_logo.svg') }}">
        @vite(['resources/css/app.scss'])
    </head>
    <body>
        <x-header></x-header>
        <div class="container">
            @yield('content')
        </div>
        @vite(['resources/js/app.js'])
    </body>
</html>
