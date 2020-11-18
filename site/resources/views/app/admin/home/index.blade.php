<x-layout>
    <x-slot name="title">{{ config('app.name') }}</x-slot>
    <x-slot name="content">
        <section class="container">
            <h2 role="heading" aria-level="2" class="title">
                {{ __('Commande des élèves') }}
            </h2>
            @foreach($orders as $order)
                <section>
                    <div>
                        <div>
                            <img src="{{ asset('images/users/small/' .$order->user->image) }}" alt="Photo de profil de {{ $order->user->full_name }}">
                            <h3 aria-level="3" role="heading">
                                {{ $order->user->full_name }}
                            </h3>
                        </div>
                        <div>
                            <small>
                                {{ $order->clotured_date }}
                            </small>
                            <a href="">{{ __('Voir plus') }}</a>
                        </div>

                        <div>
                            <p>
                                Status
                            </p>
                            <p>
                                {{ $order->statuts[count($order->statuts) - 1]->name }}
                            </p>
                        </div>

                        <div>
                            <p>
                                Total
                            </p>
                            <p>
                                {{ $order->total_price }} &euro;
                            </p>
                        </div>
                    </div>
                </section>
            @endforeach
        </section>
    </x-slot>
</x-layout>
