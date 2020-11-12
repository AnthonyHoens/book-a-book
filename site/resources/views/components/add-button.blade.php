<div>
    <form action="/" method=post">
        @csrf

        <div>
            <noscript>
                <label for="quantity">QTY</label>
                <input type="number" name="quantity" id="quantity" value="">
            </noscript>

            <input type="hidden" name="id" value="{{ $book->id }}">
            <input type="submit" value="Ajouter">
        </div>
    </form>
</div>
