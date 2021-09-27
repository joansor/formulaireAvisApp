@extends('index')
@section('title', 'Home | '. config('app.name'))
    
@section('content')
    <h1>Alsa-Sport</h1>
    <h2>Produits Sport</h2>
    <ul>
        <li class="produits"><a href="#"><img src="/images/corde.png" alt="cordeAsauter"/>Corde à sauter</a></li>
        <li class="produits"><a href="#"><img src="/images/elastic.png" alt="élastique"/>&Eacute;lastique</a></li>
    </ul>
@endsection
