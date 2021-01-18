<x-layout>
    <x-slot name="title">Commande n° {{ $orders->order_number }}</x-slot>
    <x-slot name="content">
        <div class="all_page_flex container admin_orders">
            <section class="in_preparation">
                <h2 aria-level="2" role="heading" class="title">
                    Autre commande
                </h2>
                @if ($otherOrders->count())
                    @foreach($otherOrders as $order)
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
                        Il n'y a pas encore d'autres commandes
                    </p>
                @endif
            </section>
            <section class="ordered">
                <h2 aria-level="2" role="heading" class="title">
                    Commande des étudiants
                </h2>

                <section class="student_order">
                    <div class="order_user_info">
                        <div class="order_user_name">
                            <div class="profil_img">
                                <a href="{{ route('admin.order.user.page', $orders->user->slug) }}">
                                    <img src="{{ asset('images/users/small/' .$orders->user->image) }}" alt="Photo de profil de {{ $orders->user->full_name }}">
                                </a>
                            </div>
                            <h3 aria-level="3" role="heading">
                                <a href="{{ route('admin.order.user.page', $orders->user->slug) }}">{{ $orders->user->full_name }}</a>
                            </h3>
                        </div>
                        <div class="more_info">
                            <small>
                                {{ $orders->clotured_date }}
                            </small>
                        </div>
                    </div>


                    <div>
                        @foreach($orders->books as $book)
                            <x-book :description="false" :book="$book" :image="false" :show="false">
                                <div class="book_info_flex">
                                    <p class="calculed_price">
                                        {{ $book->sale->student_price * $book->pivot->quantity }} &euro;
                                    </p>
                                    <p class="quantity">
                                        {{ $book->pivot->quantity }} exemplaires
                                    </p>
                                </div>
                            </x-book>
                        @endforeach
                    </div>

                    <div class="order_statut_flex">
                        <p class="order_def">
                            Statut
                        </p>
                        <form class="order_text" method="post" action="{{ route('admin.order.user.update') }}">
                            @csrf
                            @method('put')

                            @foreach($statuts as $statut)
                                <div>
                                    <input type="radio" id="{{ $statut->name }}" value="{{ $statut->id }}" name="statut" @if ($statut->id == $orders->statut_id) checked @endif>
                                    <label for="{{ $statut->name }}">{{ $statut->name }}</label>
                                </div>
                            @endforeach

                            <input type="hidden" name="order_id" value="{{ $orders->id }}">
                            <input type="submit" class="order_link special_link" value="Soumettre">
                        </form>
                    </div>
                    <hr>
                    <div class="order_total_flex">
                        <p class="order_def">
                            Total
                        </p>
                        <p class="order_text">
                            {{ $orders->total_price }} &euro;
                        </p>
                    </div>
                </section>
            </section>
        </div>
    </x-slot>
</x-layout>
