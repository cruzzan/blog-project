@props(['user'])

<div class="avatar mx-auto">
    <div class="default">
        <p>
        @if (!empty($user->first_name))
            {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
        @else
            {{ strtoupper(substr($user->vanity_tag, 0, 1)) }}
        @endif
        </p>
    </div>
</div>
