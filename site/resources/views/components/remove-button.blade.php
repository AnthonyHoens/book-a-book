<form action="{{ route('book_order.delete') }}" id="form-delete-{{$book->id}}" method="post" class="delete_form">
    @csrf
    @method('delete')

    <div>
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="submit" value="Supprimez ce livre" class="link remove_link">
    </div>
</form>

<script>
    const form{{$book->id}} = document.querySelector('#form-delete-{{$book->id}}');
    const newDiv{{$book->id}} = document.createElement('div');
    const newImg{{$book->id}} = document.createElement('img');

    document.onload = load();

    function load() {
        form{{$book->id}}.classList.add('sr-only');

        newDiv{{$book->id}}.classList.add('remove_btn');
        newImg{{$book->id}}.src = "{{ asset('images/icons/delete.svg') }}"

        newDiv{{$book->id}}.appendChild(newImg{{$book->id}});

        form{{$book->id}}.appendChild(newDiv{{$book->id}})
    }


    newDiv{{$book->id}}.addEventListener('click', function () {
        form{{$book->id}}.submit();
    }, false);
</script>

