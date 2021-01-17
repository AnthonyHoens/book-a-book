<x-layout>
    <x-slot name="title">Ajout d'un nouveau livre</x-slot>
    <x-slot name="content">
        <div class="all_page_flex admin_orders container">
            <section class="flex-3">
                <h2 aria-level="2" role="heading" class="title">
                    Livre dans la bibliothèque
                </h2>
                <div class="admin_book_container">
                    @if ($books->count())
                        @foreach ($books as $book)
                            <x-book :book="$book" :description="false" :image="false" :show="false">
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
            <section class="flex-7 book_form">
                <h2 aria-level="2" role="heading" class="title">
                    Ajout d'un livre
                </h2>

                <form action="{{ route('admin.book.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="field">
                        <label for="book_title">Titre du livre</label>
                        <input type="text" name="book_title" id="book_title" placeholder="Entrer le titre du livre">
                        @error('book_title')
                            <p class="error">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="book_authors">Auteur(s)</label>
                        <input type="search" name="book_authors" id="book_authors" placeholder="Entrer le(s) auteur(s)">
                        @error('book_authors')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="book_publishers">Maison d'édition</label>
                        <input type="search" name="book_publishers" id="book_publishers" placeholder="Entrer l'éditeur">
                        @error('book_publishers')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="book_isbn">ISBN</label>
                        <input type="text" name="book_isbn" id="book_isbn" placeholder="Entrer l'isbn du livre'">
                        @error('book_isbn')
                            <p class="error">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="book_starting_price">Prix public</label>
                        <input type="number" name="book_starting_price" id="book_starting_price" placeholder="Entrer le prix public" max="500" step="0.01">
                        @error('book_starting_price')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="book_student_price">Prix étudiants</label>
                        <input type="number" name="book_student_price" id="book_student_price" placeholder="Entrer le prix étudiant" max="500" step="0.01">
                        @error('book_student_price')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="book_img">Première de couvertue</label>
                        <input type="file" name="book_img" id="book_img">
                        @error('book_img')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="book_stock">Stock</label>
                        <input type="number" name="book_stock" id="book_stock" value="0" max="1000" step="1">
                        @error('book_stock')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="book_edit_detail">Détail d'édition</label>
                        <textarea name="book_edit_detail" id="book_edit_detail" placeholder="Écriver les détails du livre"></textarea>
                        @error('book_edit_detail')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="submit">
                        <input type="submit" value="Ajouter le livre" class="link">
                    </div>
                </form>
            </section>
        </div>
    </x-slot>
</x-layout>
