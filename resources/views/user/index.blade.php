@extends('root')

@section('content')
    @foreach($posts as $post)
        <p>{{ $post->heading }}</p>
    @endforeach
@endsection
