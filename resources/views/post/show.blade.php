@extends('root')

@section('content')
    <h1>{{ $heading }}</h1>
    <i>{{ $published }}</i>
    <div>{!! $content !!}</div>
@endsection
