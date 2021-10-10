@extends('layouts/app', ['title' => "$produit->name"])

@section('content')
    <div class="container_produit">
        <div class="container_linkBack">
            <a href="{{ route('home') }}/">Retour en arrière</a>
        </div>
        <div>
            <div class="poster">
                <img class="poster" src="{{ asset('images/') }}/{{ $produit->picture }}"
                    alt="{{ $produit->name }}" />
            </div>
            <div class="description">
                <h2 style="text-transform: none;">{{ $produit->name }}</h2>
                <div class="details">
                    <hr class="line_horizontal">
                    <h4>Description : <h4>
                            <div>
                                {{ $produit->description }}
                            </div>
                            <br>
                            <div>
                                <p>Prix : {{ $produit->price }},00€</p>
                            </div>
                            <hr class="line_horizontal">
                </div>
            </div>
        </div>
        <br><br>
        <div class="container p-5 container_comments">
            <h5>Laisser un commentaire sur le produit :</h5>
            <br>
            @comments(['model' => $produit])
        </div>

        {{-- <div class="row">
            <div class="container_comments">
                <h5>Avis client :</h5>
            </div>
            <hr class="line_vertical">
            <div class="container_form">
                <h5>Ajouter un commentaire sur le produit :</h5>
                <form action="action.php" method="post">
                    <p>Votre email : <input type="email" name="email" /></p>
                    <p>Votre pseudo : <input type="text" name="pseudo" /></p>
                    <p><input type="submit" value="OK"></p>
                </form>
            </div>
        </div> --}}
    </div>
@endsection
