<x-layout>
    <x-slot name="title">{{ __('Les livres')  }}</x-slot>
    <x-slot name="content">
        @foreach($books as $book)
            <x-book :book="$book" :description="true">
                <x-add-button :book="$book" :order="$order"></x-add-button>
            </x-book>
        @endforeach
    </x-slot>
</x-layout>
