<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/resources/css/style.css">
        <title>@yield('title', config('app.name'))</title>

    </head>
    <body>
     @yield('content')
       <footer>
           <p>&copy; Copyright {{ date('Y') }}
            @if(! Route::is('aboutUs'))
            &middot; <a href="{{route('aboutUs')}}">&Agrave; propos de nous</a></p>
            @endif
       </footer>
    </body>
</html>
