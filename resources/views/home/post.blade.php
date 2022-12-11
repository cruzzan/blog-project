@extends('root')

@section('content')
    <div class="row">
        <div class="col-3">
            <x-post.author-sidebar :author="$author"></x-post.author-sidebar>
        </div>
        <div class="col-9">
            <x-post.show :post="$post"></x-post.show>
        </div>
    </div>
@endsection
