<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Alsa-Sport</title>

    </head>
    <body>
       <h1>Alsa-Sport</h1>
        <h2>Produits Sport</h2>
       <ul>
           <li><a href="#">Corde à sauté</a></li>
           <li><a href="#">&Eacute;lastique</a></li>
       </ul>
       <footer>
           <p>&copy; Copyright {{ date('Y') }} &middot; <a href="/about-us">&Agrave; propos de nous</a></p>
       </footer>
    </body>
</html>
