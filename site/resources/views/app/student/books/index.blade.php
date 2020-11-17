<x-layout>
    <x-slot name="title">{{ __('Les livres')  }}</x-slot>
    <x-slot name="content">
        <div class="container main_flex">
            <section class="obligatory_book">
                <h2 role="heading" aria-level="2" class="title">
                    Livres obligatoires
                </h2>
                <div class="obligatory_book_flex">
                    @if(count($obligatoryBooks) == 0)
                        <p class="no_obligatory_book">
                            {{ __("Il n'y a pas de livres obligatoire pour le groupe") }} <strong>{{ \Illuminate\Support\Facades\Auth::user()->group->number }}</strong>
                        </p>
                    @else
                        @foreach($obligatoryBooks as $book)
                            <x-book :book="$book" :description="true" :image="false">
                                <x-add-button :book="$book" :order="$order"></x-add-button>
                            </x-book>
                        @endforeach
                    @endif
                </div>
            </section>
            <section class="book_page">
                <h2 role="heading" aria-level="2" class="title">
                    Livres
                </h2>
                <div class="book_flex">
                    @foreach($books as $book)
                        <x-book :book="$book" :description="true" :image="true">
                            <x-add-button :book="$book" :order="$order"></x-add-button>
                        </x-book>
                    @endforeach
                </div>
            </section>
        </div>
    </x-slot>
</x-layout>
