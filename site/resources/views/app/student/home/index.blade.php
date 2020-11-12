<x-layout>
    <x-slot name="title">{{ config('app.name') }}</x-slot>
    <x-slot name="content">
        <div class="main_flex container">
            <x-order :orders="$orders" :isdescription="false">
                <div>
                    <a class="link special_link" href="{{ route('order.page') }}">{{ __('Accéder à ma commande') }}</a>
                </div>
            </x-order>
            <hr>
            <section>
                <h2 aria-level="2" role="heading" class="title">
                    {{ __('Livres obligatoires') }}
                </h2>
                @foreach($books as $book)
                    <x-book :book="$book" :description="true">
                        <x-add-button :book="$book" :order="$order"></x-add-button>
                    </x-book>
                @endforeach
            </section>
        </div>
    </x-slot>
</x-layout>
