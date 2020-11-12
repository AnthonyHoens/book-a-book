<div>
    <form action="#" method="post">
        @csrf
        @method('delete')

        <div>
            <noscript>
                <label for="quantity">QTY</label>
                <input type="number" name="quantity" id="quantity">
            </noscript>

            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="submit" value="Supprimez ce livre" class="link special_link">
        </div>
    </form>
</div>
