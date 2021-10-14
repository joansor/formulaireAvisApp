@extends('layouts/app', ['title' => 'A propos de nous'])

{{-- @section('title')
&Agrave; propos de nous | Alsa-Sport
@endsection --}}

@section('content')
    <div>
        <div class="container_title">
            <h1>&Agrave; propos de nous</h1>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam molestiae reiciendis corrupti tempora ducimus
            suscipit repellendus id, temporibus quisquam consequatur error nesciunt laudantium quia, sequi voluptas dolores
            perferendis aliquam ab.</p>
        <br>
        <a href="{{ route('home') }}">Retour en arrière</a>
    </div>
@endsection