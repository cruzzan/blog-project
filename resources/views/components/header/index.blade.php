<header class="navbar py-3 mb-3 border-bottom shadow sticky-top bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><h3>SSoB</h3></a>

        @if (Auth::check())
            <p>You are logged in</p>
        @else
            <div>
                <button type="button" class="btn btn-outline-success">Logga in</button>
                <button type="button" class="btn btn-outline-primary">Skapa konto</button>
            </div>
        @endif
    </div>
</header>
