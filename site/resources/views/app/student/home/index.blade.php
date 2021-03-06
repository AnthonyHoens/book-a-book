<x-layout>
    <x-slot name="title">{{ config('app.name') }}</x-slot>
    <x-slot name="content">
        <div class="all_page_flex container">
            <section class="special_orders orders commands flex-3">
                <h2 role="heading" aria-level="2" class="title">
                    Ma commande en cours
                </h2>
                @if(count($orders) == 0)
                    <section class="order">
                        <p>
                            {{ __("Vous n'avez pas de commande en cours") }}
                        </p>
                    </section>
                    <form action="{{ route('order.create') }}" method="post" class="paid_order_form">
                        @csrf
                        @if ($order))
                            <input type="hidden" name="last_order_id" value="{{ $order->id }}">
                        @endif
                        <input type="submit" value="Créer une nouvelle commande" class="link special_link">
                    </form>
                @else
                    @foreach($orders as $order)
                        <x-order :order="$order" :isdescription="false" :isimage="false">
                            <div>
                                <a class="link special_link" href="{{ route('order.page') }}">{{ __('Accéder à ma commande') }}</a>
                            </div>
                        </x-order>
                    @endforeach
                @endif
            </section>
            <hr>
            <section class="book_container flex-7">
                <h2 aria-level="2" role="heading" class="sr-only">
                    Livres
                </h2>
                <section class="obligatory">
                    <h3 aria-level="3" role="heading" class="title">
                        {{ __('Livres obligatoires') }}
                    </h3>
                    <div class="book_flex">
                        @if(count($books) == 0)
                            <p class="no_obligatory_book">
                                {{ __("Il n'y a pas de livres obligatoire pour le groupe") }} <strong>{{ \Illuminate\Support\Facades\Auth::user()->group->number }}</strong>
                            </p>
                        @else
                            @foreach($books as $book)
                                <x-book :book="$book" :description="true" :image="true" :show="false">
                                    @if ($order)
                                        @if(!$order->validated_at)
                                            <x-add-button :book="$book" :order="$order"></x-add-button>
                                        @endif
                                    @endif
                                </x-book>
                            @endforeach
                        @endif
                    </div>
                </section>
                <section>
                    <h3 aria-level="3" role="heading" class="title">
                        {{ __('Autres livres') }}
                    </h3>
                    <div class="book_flex">
                        @if(count($otherBooks) == 0)
                            <p class="no_obligatory_book">
                                {{ __("Il n'y a pas de livres") }}
                            </p>
                        @else
                            @foreach($otherBooks as $book)
                                <x-book :book="$book" :description="true" :image="true" :show="false">
                                    @if ($order)
                                        @if(!$order->validated_at)
                                            <x-add-button :book="$book" :order="$order"></x-add-button>
                                        @endif
                                    @endif
                                </x-book>
                            @endforeach
                        @endif
                    </div>
                </section>
            </section>
        </div>
    </x-slot>
</x-layout>
