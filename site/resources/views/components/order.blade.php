<section class="order">
    <h3 role="heading" aria-level="3">
        @if(request()->routeIs('order.show', $order->order_number))
            Commande n° {{ $order->number_of_order_by_user }}
        @else
            <a href="{{ route('order.show', $order->order_number) }}">Commande n° {{ $order->number_of_order_by_user }}</a>
        @endif
    </h3>

    <p class="order_number">
        @if(request()->routeIs('order.show', $order->order_number))
            Numéro de commande: {{ $order->order_number }}
        @else
            <a href="{{ route('order.show', $order->order_number) }}">Numéro de commande: {{ $order->order_number }}</a>
        @endif
    </p>
    @if(count($order->books) == 0)
        <p class="no_book">
            {{ __('Vous n\'avez pas encore de livres dans votre commande') }}
        </p>
    @else
        @foreach($order->books as $book)
            <x-book description="{{ $isdescription }}" :book="$book" :image="$isimage" :show="false">
                @if($order->validated_at)
                    <div class="book_info_flex">
                        <p class="calculed_price">
                            {{ $book->sale->student_price * $book->pivot->quantity }} &euro;
                        </p>
                        <p class="quantity">
                            {{ $book->pivot->quantity }} exemplaires
                        </p>
                    </div>
                @else
                    <div class="book_info_flex">
                        <p class="calculed_price">
                            {{ $book->sale->student_price * $book->pivot->quantity }} &euro;
                        </p>
                        <form action="{{ route('book_order.update') }}" method="post" class="change_number">
                            @csrf
                            @method('put')

                            <div>
                                <label for="quantity-{{ $loop->index }}">QTY</label>
                                <input type="number" name="quantity" id="quantity-{{ $loop->index }}" value="{{ $book->pivot->quantity }}" min="0">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <input type="submit" value="Changer" class="link">
                            </div>
                        </form>
                    </div>
                    <x-remove-button :book="$book" :order="$order"></x-remove-button>
                @endif
            </x-book>
        @endforeach
    @endif
    <div class="total">
        <p class="text">
            Total
        </p>
        <p class="final_price">
            {{ $order->total_price }} &euro;
        </p>
    </div>
</section>
{{ $slot }}

