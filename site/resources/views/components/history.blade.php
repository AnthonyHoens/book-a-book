<section class="message">
    <h2 role="heading" aria-level="2" class="title">
        {{ $title }}
    </h2>

    <div>
        @if($histories->count())
            @foreach($histories as $message)
                <x-message :message="$message" :userName="$userName"></x-message>
            @endforeach
        @else
            <p class="book">
                Vous n'avez pas encore d'historique
            </p>
        @endif
    </div>

    <div>
        {{ $histories->links('vendor.pagination.tailwind') }}
    </div>
</section>
