@props(['post'])

<div class="card mb-3 px-0">
    <div class="row g-0">
        <div class="col-4">
            <div class="rounded-start placeholder-image h-100 d-flex justify-content-center align-items-center text-uppercase font-monospace">Image</div>
        </div>
        <div class="col-8">
            <div class="card-header">{{ $post->heading }}</div>
            <div class="card-body">
                <p class="card-text"><i>{{ $post->created_at }}</i></p>
                <a href="{{ route('user_post', ['user_slug' => $post->user->vanity_tag, 'post' => $post->id]) }}" class="btn btn-primary">Read...</a>
            </div>
        </div>
    </div>
</div>
