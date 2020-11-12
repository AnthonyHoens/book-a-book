<section class="message">
    <h2 role="heading" aria-level="2" class="title">
        Notifications
    </h2>

    <div>
        @foreach($notifications as $message)
            <x-message :message="$message"></x-message>
        @endforeach
    </div>
</section>
