<header class="navbar py-0 mb-3 border-bottom shadow sticky-top bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="{{ Vite::asset('resources/static/images/ssob_logo.svg') }}" alt="SSoB">
        </a>

        @if (Auth::check())
            <a href="{{ route('logout') }}"><button class="btn btn-outline-danger">Log out</button></a>
        @endif

        @if(substr_count(URL::current(), 'login') <= 0 && !Auth::check())
            <div>
                <a href="{{ route('login') }}"><button type="button" class="btn btn-outline-success">Logga in</button></a>
                <a href="{{ route('register') }}"><button type="button" class="btn btn-outline-primary">Skapa konto</button></a>
            </div>
        @endif
    </div>
</header>
