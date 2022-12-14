@extends('root')

@section('content')
    <div class="row">
        <div>
            <a href="{{ route('post.create') }}" class="btn btn-dark m-2"><i data-feather="plus"></i> Create a new post</a>
        </div>

        @if (session()->has('message'))
            <div>
                <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                    <i data-feather="trash-2"></i>
                    <div class="ps-4">{{ session()->get('message') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>

    <div class="row pb-4">
        <div class="col-2">Created</div>
        <div class="col-2">Updated</div>
        <div class="col">Heading</div>
        <div class="col-2"></div>
        <hr>
    </div>

    @foreach($posts as $post)
        <div class="row pb-3">
            <div class="col-2">{{ $post->created_at }}</div>
            <div class="col-2">{{ $post->updated_at }}</div>
            <div class="col">{{ $post->heading }}</div>
            <div class="col-2">
                <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
                <a href="{{ route('post.destroy', ['post' => $post->id]) }}" class="btn btn-sm btn-danger"><i data-feather="trash-2"></i></a>
            </div>
        </div>
    @endforeach
@endsection
