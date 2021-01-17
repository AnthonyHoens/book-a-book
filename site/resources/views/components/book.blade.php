<section class="book">
    @if($book->cover_page)
        @if($image)
            <div class="img">
                <a href="{{ route('book.show', $book->slug) }}">
                    <img src="{{ asset('images/books/full/'. $book->cover_page) }}" alt="Première de couverture du livre '{{ $book->title }}'">
                </a>
            </div>
        @endif
    @endif
    <div class="info">
        <div>
            <h3 aria-level="3" role="heading">
                <a href="{{ route('book.show', $book->slug) }}">{{ $book->title }}</a>
            </h3>
            @if($book->authors)
                <h4 aria-level="4" role="heading">
                    @if($show)
                        Auteurs:
                    @endif
                    @foreach($book->authors as $author)
                        <span>{{ $author->name . ', ' }}</span>
                    @endforeach
                </h4>
            @endif
            @if($show)
                <h4 aria-level="4" role="heading" class="publishers">
                    Éditeurs:
                    @foreach($book->publishers as $publisher)
                        <span>{{ $publisher->name . ', ' }}</span>
                    @endforeach
                </h4>
                <p class="isbn">
                    ISBN: {{ $book->isbn }}
                </p>
            @endif
            @if($description)
                <p class="edit_detail">
                    @if ($show)
                        {{ $book->edit_detail }}
                    @else
                        {{ $book->reduce_detail }}
                    @endif
                </p>
            @endif
        </div>
        <div>
            @if($show)
                <p class="price_text">
                    Prix de départ: <span class="price">{{ $book->sale->starting_price }}&nbsp;&euro;</span>
                </p>
            @endif
            <p class="price_text">
                @if($show) Prix étudiants: @endif <span class="price">{{ $book->sale->student_price }}&nbsp;&euro;</span>
            </p>

            {{ $slot }}
        </div>
    </div>

</section>
