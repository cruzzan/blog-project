<div class="card">
    <div class="card-header">
        <div class="col">
            <x-avatar :user="$author"></x-avatar>
        </div>
    </div>
    <div class="card-body">
        <h4 class="card-title">{{ $author->vanity_tag }}</h4>
        @if (!empty($author->first_name))
            <h5 class="card-subtitle text-muted"> {{ $author->fullName() }}</h5>
        @endif
    </div>
</div>
