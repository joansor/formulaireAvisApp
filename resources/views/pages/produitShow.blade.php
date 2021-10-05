@extends('layouts/app', ['title' => "$produit->name"])

@section('content')
    <div class="container_produit">
        <div class="row">
            <div class="poster">
                <img class="poster" src="{{ asset('images/') }}/{{ $produit->picture }}"
                    alt="{{ $produit->name }}" />
            </div>
            <div class="containerline">
                <hr class="line_vertical">
            </div>
            <div class="description">
                <h2 style="text-transform: none;">{{ $produit->name }}</h2>
                <div class="details">
                    <h4>Description : <h4>
                    <div>
                        {{ $produit->description }}
                    </div>
                    <br>
                    <div>
                        <p>Prix : {{ $produit->price }},00€</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('home') }}/">Retour en arrière</a>
@endsection
