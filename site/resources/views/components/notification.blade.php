<section class="message">
    <h2 role="heading" aria-level="2" class="title">
        Notifications
    </h2>

    <div>
        @if($notifications->count())
            @foreach($notifications as $message)
                <x-message :message="$message" :userName="false"></x-message>
            @endforeach
        @else
            <p class="book">
                Vous n'avez pas encore de notification
            </p>
        @endif
    </div>
</section>
