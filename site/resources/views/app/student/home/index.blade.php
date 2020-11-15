<x-layout>
    <x-slot name="title">{{ config('app.name') }}</x-slot>
    <x-slot name="content">
        <div class="main_flex container">
            <x-order :orders="$orders" :isdescription="false" :isimage="false">
                @if(count($orders) == 0)
                    <form action="{{ route('home.page') }}" method="post">
                        @csrf
                        <input type="submit" class="link special_link" value="{{ __('Créer une commande') }}">
                    </form>
                @else
                    <div>
                        <a class="link special_link" href="{{ route('order.page') }}">{{ __('Accéder à ma commande') }}</a>
                    </div>
                @endif
            </x-order>
            <hr>
            <section class="book_container">
                <h2 aria-level="2" role="heading" class="title">
                    {{ __('Livres obligatoires') }}
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
