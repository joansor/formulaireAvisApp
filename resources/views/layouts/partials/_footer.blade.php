<footer>
    <p>&copy; Copyright {{ date('Y') }}
        @if(! Route::is('about-us'))
        &middot; <a href="{{ route('about-us') }}">&Agrave; propos de nous</a>
        @endif
    </p>
</footer>