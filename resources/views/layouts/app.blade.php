<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <title>@yield('title', config('app.name'))</title> --}}
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('images/sportIcon.png') }} />
    <title>{{ isset($title) ? '' . $title . ' | ' . config('app.name') : config('app.name') }}</title>
</head>

<body>
    <main role="main">
        @yield('content')
    </main>
    @include('layouts/partials/_footer')
</body>

</html>
