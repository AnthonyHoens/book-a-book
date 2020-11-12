<x-layout>
    <x-slot name="title">{{ __('Ma commande | ') . $orders->order_number  }}</x-slot>
    <x-slot name="content">
        <div class="profil_flex">
            <x-profil-nav></x-profil-nav>
            <hr>
            <x-order :orders="$orders" :isdescription="true"></x-order>
        </div>
    </x-slot>
</x-layout>
