@if(!$order->id_of_books->contains($book->id))
    <div>
        <form action="#" method="post">
            @csrf

            <div>
                <label for="quantity">QTY</label>
                <input type="number" name="quantity" id="quantity" value="1">

                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="submit" value="Ajouter">
            </div>
        </form>
    </div>
@endif
