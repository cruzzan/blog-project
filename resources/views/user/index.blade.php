@extends('root')

@section('content')
    <div class="row pb-4">
        <div class="col-2">Name</div>
        <div class="col-2">Email</div>
        <div class="col-2">Vanity tag</div>
        <div class="col-6">Capabilities</div>
        <hr>
    </div>

    @foreach($users as $user)
        <div class="row pb-3">
            <div class="col-2">{{ $user->fullName() }}</div>
            <div class="col-2">{{ $user->email }}</div>
            <div class="col-2">{{ $user->vanity_tag }}</div>
            <div class="col-6">
                @foreach(\App\Models\Enums\CapabilityTag::cases() as $capability)
                    <a href="{{ route('user.toggleCapability', ['user' => $user->id, 'capability' => $capability->value]) }}" class="btn @if ($user->hasCapability($capability)) btn-primary @else btn-outline-primary @endif btn-sm mb-1">{{ $capability->getText() }}</a>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
