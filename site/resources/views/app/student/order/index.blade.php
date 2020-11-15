<x-layout>
    <x-slot name="title">{{ __('Mes commandes')  }}</x-slot>
    <x-slot name="content">
        <div class="profil_flex">
            <x-profil-nav></x-profil-nav>
            <hr>
            @if(count($orders) == 0)
                <section class="order">
                    <p>
                        {{ __("Vous n'avez pas encore fait de commande") }}
                    </p>
                </section>
            @else
                @foreach($orders as $order)
                    <x-order :order="$order" :isdescription="false" :isimage="true">
                        @if(count($orders) == 0)
                            <form action="{{ route('home.page') }}" method="post" class="paid_order_form">
                                @csrf
                                <input type="submit" class="link" value="{{ __('Créer une commande') }}">
                            </form>
                        @else
                            <div class="order_flex">
                                <form action="{{ route('order.page') }}" method="post" class="paid_order_form">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <input type="submit" value="Payez la commande" class="link">
                                </form>
                                <form action="{{ route('order.page') }}" method="post" class="paid_order_form">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <input type="submit" value="Supprimez cette commande" class="link remove_link">
                                </form>
                            </div>
                        @endif
                    </x-order>
                @endforeach
            @endif
        </div>
    </x-slot>
</x-layout>
