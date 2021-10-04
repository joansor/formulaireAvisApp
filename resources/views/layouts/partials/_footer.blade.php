<footer>
    <p>&copy; Copyright {{ date('Y') }}
        @if(! Route::is('aboutUs'))
        &middot; <a href="{{route('aboutUs')}}">&Agrave; propos de nous</a>
        @endif
    </p>
</footer>