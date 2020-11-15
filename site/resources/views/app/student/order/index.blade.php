<x-layout>
    <x-slot name="title">{{ __('Mes commandes')  }}</x-slot>
    <x-slot name="content">
        <div class="profil_flex">
            <x-profil-nav></x-profil-nav>
            <hr>
            <x-order :orders="$orders" :isdescription="false" :isimage="true">
                @if(count($orders) == 0)
                    <form action="{{ route('home.page') }}" method="post" class="paid_order_form">
                        @csrf
                        <input type="submit" class="link" value="{{ __('Créer une commande') }}">
                    </form>
                @else
                    <form action="{{ route('order.page') }}" method="post" class="paid_order_form">
                        @csrf
                        <input type="submit" value="Payez la commande" class="link">
                    </form>
                @endif
            </x-order>
        </div>
    </x-slot>
</x-layout>
