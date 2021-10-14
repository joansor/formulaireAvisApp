@extends('layouts/app', ['title' => "$product->name"])

@section('content')
    <div class="container_produit">
        <div class="container_linkBack">
            <a href="{{ route('home') }}/">Retour en arrière</a>
        </div>
        <div>
            <div class="poster">
                <img class="poster" src="{{ asset('images/') }}/{{ $product->picture }}"
                    alt="{{ $product->name }}" />
            </div>
            <div class="description">
                <h2 style="text-transform: none;">{{ $product->name }}</h2>
                <div class="details">
                    <hr class="line_horizontal">
                    <h4>Description : <h4>
                            <div>
                                {{ $product->description }}
                            </div>
                            <br>
                            <div>
                                <p>Prix : {{ $product->price }},00€</p>
                            </div>
                            <hr class="line_horizontal">
                </div>
            </div>
        </div>
        <br><br>
        <div class="container p-5 col-12 col-sm-12 col-md-12 col-lg-12 container_comments">
            <h5>Laisser un commentaire sur le produit :</h5>
            <br>
            @comments(['model' => $product])
        </div>
    </div>
@endsection