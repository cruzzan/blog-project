@extends('root')

@section('content')
    <h2 class="text-center">Register an account</h2>
    @if ($errors->any())
        <div class="alert alert-danger col-6 mx-auto">
            There are some errors in the form.
        </div>
    @endif
    <form method="POST" action="{{ route('register.submit') }}" class="col-6 mx-auto">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="First name" aria-label="First name" value="{{ old('first_name') }}">
                @error('first_name')
                <div class="invalid-feedback">
                    {{ $message  }}
                </div>
                @enderror
            </div>
            <div class="col">
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Last name" aria-label="Last name" value="{{ old('last_name') }}">
                @error('last_name')
                <div class="invalid-feedback">
                    {{ $message  }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" aria-label="Email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message  }}
                </div>
                @enderror
            </div>
            <div class="col">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" aria-label="Password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message  }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text" id="vanity-prefix">{{ url('/') }}/</span>
                    <input type="text" class="form-control @error('vanity_tag') is-invalid hasValidation @enderror" id="vanity_tag" name="vanity_tag" aria-describedby="vanity-prefix" placeholder="my-vanity-tag" aria-label="Vanity tag" value="{{ old('vanity_tag') }}">
                    @error('vanity_tag')
                    <div class="invalid-feedback">
                        {{ $message  }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
        </div>
    </form>
@endsection
