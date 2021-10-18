@extends('layouts/app')
{{-- @section('title', 'Home | ' . config('app.name')) --}}
@section('content')
    <div id="container_home">
        <div class="container_title">
            <h1>Alsa-Sport</h1>
        </div>
        <br>
        <h2>Produits sport</h2>
        @if ($products->count() > 0)
            <article id="listeProduits">
                @foreach ($products as $product)
                    <article class="produits">
                        <div class="cadreImg">
                            <a href="{{ route('product.show', ['id' => $product->id ]) }}"><img class="poster" src="{{ asset('images/') }}/{{ $product->picture }}" alt="{{ $product->name }}" /></a>
                        </div>
                        <a href="{{ route('product.show', ['id' => $product->id ]) }}">
                            <br>
                            <h3>{{ $product->name }}</h3>
                            <p class="price">{{ $product->price }},00€</p>
                        </a>
                    </article>
                @endforeach
            </article>
        @else
            <p>Pas d'article...</p>
        @endif
    </div>
@endsection
