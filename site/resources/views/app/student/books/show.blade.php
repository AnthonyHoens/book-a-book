<x-layout>
    <x-slot name="title">{{ __('Livres | ' . $book->title)  }}</x-slot>
    <x-slot name="content">
        <div class="container all_page_flex">
            @if (!\Illuminate\Support\Facades\Auth::user()->isAdmin)
                <section class="obligatory_book flex-3">
                    <h2 role="heading" aria-level="2" class="title">
                        Livres obligatoires
                    </h2>
                    <div class="obligatory_book_flex">
                        @if(count($obligatoryBooks) == 0)
                            <p class="no_obligatory_book">
                                {{ __("Il n'y a pas de livres obligatoire pour le groupe") }} <strong>{{ \Illuminate\Support\Facades\Auth::user()->group->number }}</strong>
                            </p>
                        @else
                            @foreach($obligatoryBooks as $books)
                                <x-book :book="$book" :description="true" :image="false" :show="false">
                                    <x-add-button :book="$books" :order="$order"></x-add-button>
                                </x-book>
                            @endforeach
                        @endif
                    </div>
                </section>
            @endif
            <section class="book_show flex-7">
                <h2 role="heading" aria-level="2" class="title">
                    Livres
                </h2>
                <div class="book_flex">
                    <x-book :book="$book" :description="true" :image="true" :show="true">
                        <x-add-button :book="$book" :order="$order"></x-add-button>
                    </x-book>
                </div>
            </section>
        </div>
    </x-slot>
</x-layout>
