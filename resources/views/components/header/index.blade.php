<header class="navbar py-3 mb-3 border-bottom shadow sticky-top bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><h3>SSoB</h3></a>

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
