<form action="#" method="post" class="delete_form">
    @csrf
    @method('delete')

    <div>
        <noscript>
            <label for="quantity">QTY</label>
            <input type="number" name="quantity" id="quantity">
        </noscript>

        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="submit" value="Supprimez ce livre" class="link special_link">
    </div>
</form>

