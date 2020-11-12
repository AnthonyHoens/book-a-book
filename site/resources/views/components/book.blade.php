<section class="book">
    @if($book->cover_page)
        <div class="img">
            <img src="{{ asset('images/books/'. $book->cover_page) }}" alt="Première de couverture du livre '{{ $book->title }}'">
        </div>
    @endif
    <div class="info">
        <h3 aria-level="3" role="heading">
            {{ $book->title }}
        </h3>
        @if($book->authors)
            <h4 aria-level="4" role="heading">
                @foreach($book->authors as $author)
                    <span>{{ $author->name . ', ' }}</span>
                @endforeach
            </h4>
        @endif
        @if($description)
            <p class="edit_detail">
                {{ $book->edit_detail }}
            </p>
        @endif
        <p class="price">
            {{ $book->sale->student_price }}&nbsp;&euro;
        </p>

        {{ $slot }}
    </div>

</section>
