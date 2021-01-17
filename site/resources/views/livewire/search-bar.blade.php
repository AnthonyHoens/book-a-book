<div class="search_bar">
    <form action="{{ route('book.page') }}" method="get">
        <label for="search"><img src="{{ asset('images/icons/search_icon.svg') }}" alt></label>
        <input type="text" id="search" name="search" wire:model.debounce.200ms="search" placeholder="Rechercher un livre">
    </form>
    <div class="search_book">
        @if ($queryBooks)
            @foreach($queryBooks as $book)
                <x-book :book="$book" :description="false" :image="false" :show="false">
                    @if ($order)
                        @if(!$order->validated_at)
                            <x-add-button :book="$book" :order="$order"></x-add-button>
                        @endif
                    @endif
                </x-book>
            @endforeach
        @endif
    </div>
</div>
