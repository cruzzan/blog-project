@extends('root')

@section('content')
    <div class="col-10">
        @foreach($posts as $post)
            <x-post.miniature :post="$post"></x-post.miniature>
        @endforeach
    </div>
@endsection
