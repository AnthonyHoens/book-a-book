<section class="pattern">
    <p class="small">
        <small>
            {{ $message->date }}
        </small>
    </p>
    <h3 role="heading" aria-level="3">
        @if ($userName)
            {{ $message->user->first_name . ' ' . $message->user->name }}
        @else
            {{ $message->title }}
        @endif
    </h3>
    <p>
        {{ $message->message }}
    </p>
</section>
