@extends('root')

@section('content')
    <main class="form-signin m-auto">
        <div class="col-lg-4 mx-auto rounded">
            <h2 class="text-center">Sign in</h2>
            @error('email')
            <div class="alert alert-danger">{{ $message  }}</div>
            @enderror
            <form method="POST" href="/login" class="d-flex flex-column align-items-center">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary w-75">Go...</button>
            </form>
        </div>
    </main>
@endsection
