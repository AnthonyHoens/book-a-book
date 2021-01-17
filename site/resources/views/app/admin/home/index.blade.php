<x-layout>
    <x-slot name="title">{{ config('app.name') }}</x-slot>
    <x-slot name="content">
        <section class="container admin_home_page all_page_flex">
            <div class="student_orders">
                <h2 role="heading" aria-level="2" class="title">
                    {{ __('Commande des élèves') }}
                </h2>
                @if ($orders->count())
                    @foreach($orders as $order)
                        <section class="student_order">
                            <div class="order_user_info">
                                <div class="order_user_name">
                                    <div class="profil_img">
                                        <a href="{{ route('admin.order.user.page', $order->user->slug) }}">
                                            <img src="{{ asset('images/users/small/' .$order->user->image) }}" alt="Photo de profil de {{ $order->user->full_name }}">
                                        </a>
                                    </div>
                                    <h3 aria-level="3" role="heading">
                                        <a href="{{ route('admin.order.user.page', $order->user->slug) }}">{{ $order->user->full_name }}</a>
                                    </h3>
                                </div>
                                <div class="more_info">
                                    <small>
                                        {{ $order->clotured_date }}
                                    </small>
                                    <a href="{{ route('admin.order.user.show', [$order->user->slug, $order->order_number]) }}" class="order_link">{{ __('Voir plus') }}</a>
                                </div>
                            </div>

                            <div class="order_statut_flex">
                                <p class="order_def">
                                    Statut
                                </p>
                                <p class="order_text">
                                    {{ $order->statut->name }}
                                </p>
                            </div>
                            <hr>
                            <div class="order_total_flex">
                                <p class="order_def">
                                    Total
                                </p>
                                <p class="order_text">
                                    {{ $order->total_price }} &euro;
                                </p>
                            </div>
                        </section>
                    @endforeach
                @else
                    <p class="book">
                        Il n'y a pas encore de commande d'étudiants
                    </p>
                @endif
            </div>
            <div class="student_history">
                <x-history :histories="$histories" :userName="true">
                    <x-slot name="title">Historique des élèves</x-slot>
                </x-history>
            </div>
        </section>
    </x-slot>
</x-layout>
