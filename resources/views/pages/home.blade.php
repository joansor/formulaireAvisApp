@extends('layouts/app')
{{-- @section('title', 'Home | ' . config('app.name')) --}}
@section('content')
    <div id="container_home">
        <div class="container_title">
            <h1>Alsa-Sport</h1>
        </div>
        <h2>Produits sport</h2>
        <article id="listeProduits">
            <article class="produits">
                <div class="cadreImg">
                <a href="#"><img class="poster" src="{{ asset('images/corde.png') }}" alt="corde à sauter" /></a>
                </div>
                <a href="#">
                    <h3>Corde à sauter</h3>
                    <p class="price">10€</p>
                </a>
            </article>
            <article class="produits">
                <div class="cadreImg">
                <a href="#"><img class="poster" src="{{ asset('images/elastic.png') }}" alt="élastique" /></a>
                </div>
                <a href="#">
                    <h3>&Eacute;lastique</h3>
                    <p class="price">8€</p>
                </a>
            </article>
        </article>
    </div>
@endsection
