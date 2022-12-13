@props(['post'])

<h1 class="display-1 text-center">{{ $post->heading }}</h1>

<p class="text-muted"><small>Created: {{ $post->created_at }} - Last updated: {{ $post->updated_at }}</small></p>

<div class="ck-content">
    {!! $post->content !!}
</div>
