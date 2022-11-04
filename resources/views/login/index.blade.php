@extends('root')

@section('content')
    <main class="form-signin w-100 m-auto">
        <h2>Sign in</h2>
        @error('email')
        <div class="alert alert-danger">{{ $message  }}</div>
        @enderror
        <form method="POST" href="/login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Go...</button>
        </form>
    </main>
@endsection
