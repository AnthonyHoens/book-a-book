@php $n = 0 @endphp
<section class="orders">
    <h2 role="heading" aria-level="2" class="title">
        Ma commande
    </h2>

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
                <x-book description="{{ $isdescription }}" :book="$book">
                    <div class="book_info_flex">
                        <p class="calculed_price">
                            {{ $book->sale->student_price * $book->pivot->quantity }} &euro;
                        </p>
                        <form action="#" method="post" class="change_number">
                            <div>
                                <label for="quantity-{{ $loop->index }}">QTY</label>
                                <input type="number" name="quantity" id="quantity-{{ $loop->index }}" value="{{ $book->pivot->quantity }}">
                                <input type="submit" value="Changer" class="link">
                            </div>
                        </form>
                    </div>
                    <x-remove-button :book="$book"></x-remove-button>
                </x-book>
            @endforeach
            <div>
                <p>
                    Total
                </p>
            </div>
        </section>
    @endforeach
    {{ $slot }}
</section>
