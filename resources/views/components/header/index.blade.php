<header class="navbar py-0 mb-3 border-bottom shadow sticky-top bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="{{ Vite::asset('resources/static/images/ssob_logo.svg') }}" alt="SSoB">
        </a>

        @if (Auth::check())
            <div>
                <a href="{{ route('user_home', ['user_slug' => Auth::user()->vanity_tag]) }}"><button class="btn btn-outline-primary">My posts</button></a>
                @can('viewAny', \App\Models\User::class)
                    <a href="{{ route('user.index') }}"><button class="btn btn-outline-dark">Users</button></a>
                @endcan
                <a href="{{ route('logout') }}"><button class="btn btn-outline-danger">Log out</button></a>
            </div>
        @endif

        @if(substr_count(URL::current(), 'login') <= 0 && !Auth::check())
            <div>
                <a href="{{ route('login') }}"><button type="button" class="btn btn-outline-success">Log in</button></a>
                <a href="{{ route('register') }}"><button type="button" class="btn btn-outline-primary">Sign up</button></a>
            </div>
        @endif
    </div>
</header>
