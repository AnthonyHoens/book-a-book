<section class="message">
    <h2 role="heading" aria-level="2" class="title">
        Historique
    </h2>

    <div>
        @foreach($histories as $message)
            <x-message :message="$message"></x-message>
        @endforeach
    </div>
</section>
