<x-layout>
    <x-slot name="title">{{ __('Mes commandes')  }}</x-slot>
    <x-slot name="content">
        <div class="all_page_flex profil_page profil_container">
            <x-profil-nav></x-profil-nav>
            <hr>
            <section class="orders">
                <h2 class="title" aria-level="2" role="heading">
                    Paiement de la commande n° {{ $order->number_of_order_by_user }}
                </h2>

                <div class="special_book book">
                    <p>
                        <strong>Accompte bancaire :</strong> BE78 0065 4512 4502 1
                    </p>
                    
                    <p>
                        <strong>Communication</strong> : {{ $order->user->name . '-' . $order->user->first_name }}-{{ $order->user->group->number }}
                    </p>

                    <p>
                        <strong>Total à payer :</strong> {{ $order->total_price }} &euro;
                    </p>
                </div>
            </section>
        </div>
    </x-slot>
</x-layout>
