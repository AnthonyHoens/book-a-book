<x-layout>
    <x-slot name="title">{{ __('Mes commandes')  }}</x-slot>
    <x-slot name="content">
        <div class="all_page_flex profil_page profil_container">
            <x-profil-nav></x-profil-nav>
            <hr>
            <section class="orders commands">
                <h2 role="heading" aria-level="2" class="title">
                    Mes commandes
                </h2>
                @if(count($orders) == 0)
                    <section class="order">
                        <p>
                            {{ __("Vous n'avez pas de commande en cours") }}
                        </p>
                    </section>
                @else
                    @foreach($orders as $order)
                        <x-order :order="$order" :isdescription="false" :isimage="true">
                            @if($order->validated_at)
                                <p class="clotured">
                                    Cette commande a été cloturée
                                </p>
                            @endif
                            @if(count($orders) == 0)
                                <form action="{{ route('order.create') }}" method="post" class="paid_order_form">
                                    @csrf
                                    <input type="submit" class="link" value="{{ __('Créer une commande') }}">
                                </form>
                            @else
                                <div class="order_flex">
                                    @if($order->validated_at)
                                        <div class="paid_order_form">
                                            <a href="{{ route('order.paid.page', $order->order_number) }}" class="link margin_link">Voir la page de paiement</a>
                                        </div>
                                    @else
                                        <form action="{{ route('order.update') }}" method="post" class="paid_order_form">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <input type="submit" value="Payez la commande" class="link margin_link">
                                        </form>
                                    @endif
                                    @if(!$order->validated_at)
                                        <form action="{{ route('order.delete') }}" method="post" class="paid_order_form">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <input type="submit" value="Supprimez cette commande" class="link remove_link margin_link">
                                        </form>
                                    @endif
                                </div>
                            @endif
                        </x-order>
                    @endforeach
                @endif
            </section>
        </div>
    </x-slot>
</x-layout>
