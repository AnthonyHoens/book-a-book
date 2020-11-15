@php $n = 0 @endphp
<section class="orders commands">
    <h2 role="heading" aria-level="2" class="title">
        Ma commande
    </h2>

    @if(count($orders) != 0)
        @foreach($orders as $order)
            @php ++$n; @endphp
            <section class="order">
                <h3 role="heading" aria-level="3">
                    Commande n° {{ $n }}
                </h3>

                <p class="order_number">
                    Numéro de commande: {{ $order->order_number }}
                </p>
                @foreach($order->books as $book)
                    <x-book description="{{ $isdescription }}" :book="$book" :image="$isimage">
                        <div class="book_info_flex">
                            <p class="calculed_price">
                                {{ $book->sale->student_price * $book->pivot->quantity }} &euro;
                            </p>
                            <form action="#" method="post" class="change_number">
                                @csrf
                                @method('put')

                                <div>
                                    <label for="quantity-{{ $loop->index }}">QTY</label>
                                    <input type="number" name="quantity" id="quantity-{{ $loop->index }}" value="{{ $book->pivot->quantity }}">
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <input type="submit" value="Changer" class="link">
                                </div>
                            </form>
                        </div>
                        <x-remove-button :book="$book" :order="$order"></x-remove-button>
                    </x-book>
                @endforeach
                <div class="total">
                    <p class="text">
                        Total
                    </p>
                    <p class="final_price">
                        {{ $order->total_price }} &euro;
                    </p>
                </div>
            </section>
        @endforeach
    @else
        <section class="order">
            <p>
                {{ __("Vous n'avez pas encore fait de commande") }}
            </p>
        </section>
    @endif
    {{ $slot }}
</section>
