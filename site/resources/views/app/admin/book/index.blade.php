<x-layout>
    <x-slot name="title">Livres</x-slot>
    <x-slot name="content">
        <section class="admin container">
            <div class="add_book">
                <a href="{{ route('admin.book.create') }}" class="link">Ajouter un livre</a>
            </div>
            <h2 role="heading" aria-level="2" class="title">
                Livres
            </h2>
            <div class="book_flex">
                @if ($books->count())
                    @foreach($books as $book)
                        <x-book :book="$book" :description="true" :image="true" :show="false">
                            <div class="book_info_flex">
                                <p class="stock">
                                    {{ $book->stock }} livres sont encore en stock
                                </p>
                            </div>
                            <form action="{{ route('admin.book.delete') }}" id="form-delete-{{$book->id}}" method="post">
                                @csrf()
                                @method('delete')
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="submit" value="Supprimer ce livre" class="remove_link special_link link">
                            </form>
                            <script>
                                const form{{$book->id}} = document.querySelector('#form-delete-{{$book->id}}');
                                const newDiv{{$book->id}} = document.createElement('div');
                                const newImg{{$book->id}} = document.createElement('img');

                                document.onload = load();

                                function load() {
                                    form{{$book->id}}.classList.add('sr-only')

                                    newDiv{{$book->id}}.classList.add('remove_btn');
                                    newImg{{$book->id}}.src = "{{ asset('images/icons/delete.svg') }}"

                                    newDiv{{$book->id}}.appendChild(newImg{{$book->id}});

                                    form{{$book->id}}.appendChild(newDiv{{$book->id}})
                                }


                                newDiv{{$book->id}}.addEventListener('click', function () {
                                    form{{$book->id}}.submit();
                                }, false);
                            </script>
                        </x-book>
                    @endforeach
                @else
                    <p class="book">
                        Il n'y a pas de livres
                    </p>
                @endif
            </div>
        </section>
    </x-slot>
</x-layout>
