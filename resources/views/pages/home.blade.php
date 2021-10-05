@extends('layouts/app')
{{-- @section('title', 'Home | ' . config('app.name')) --}}
@section('content')
    <div id="container_home">
        <div class="container_title">
            <h1>Alsa-Sport</h1>
        </div>
        <h2>Produits sport</h2>
        @if ($produits->count() > 0)
            <article id="listeProduits">
                @foreach ($produits as $produit)
                    <article class="produits">
                        <div class="cadreImg">
                            <a href="{{ route('produits.show', ['id' => $produit->produit_id ]) }}"><img class="poster" src="{{ asset('images/') }}/{{ $produit->picture }}"
                                    alt="{{ $produit->name }}" /></a>
                        </div>
                        <a href="{{ route('produits.show', ['id' => $produit->produit_id ]) }}">
                            <br>
                            <h3>{{ $produit->name }}</h3>
                            <p class="price">{{ $produit->price }},00€</p>
                        </a>
                    </article>
                @endforeach
            </article>
        @else
            <p>Pas d'article...</p>
        @endif
    </div>
@endsection
