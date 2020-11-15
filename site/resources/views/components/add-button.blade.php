@if($order)
@if(!$order->id_of_books->contains($book->id))
    <div class="book_info_flex">
        <form action="#" method="post" class="change_number">
            @csrf

            <div>
                <label for="quantity">QTY</label>
                <input type="number" name="quantity" id="quantity" value="1">

                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="submit" class="link" value="Ajouter">
            </div>
        </form>
    </div>
@endif
@endif

