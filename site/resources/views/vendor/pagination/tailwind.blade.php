@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="paginate_flex">
        <div class="paginate_previous_next_flex">
            @if ($paginator->onFirstPage())
                <span class="paginate_previous_not_link">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="paginate_previous_link">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="paginate_next_link">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="paginate_next_not_link">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="paginate_items">
            <div>
                <p class="paginate_items_p">
                    {!! __('Affichage de') !!}
                    <span class="paginate_items_span">{{ $paginator->firstItem() }}</span>
                    {!! __('à') !!}
                    <span class="paginate_items_span">{{ $paginator->lastItem() }}</span>
                    {!! __('sur') !!}
                    <span class="paginate_items_span">{{ $paginator->total() }}</span>
                    {!! __('résultats') !!}
                </p>
            </div>

            <div>
                <span class="paginate_page_container">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="paginate_img_previous_not_link" aria-hidden="true">
                                <svg class="paginate_img" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="paginate_img_previous_link" aria-label="{{ __('pagination.previous') }}">
                            <svg class="paginate_img" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="paginate_element_string">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="paginate_element_array_not_link">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="paginate_element_array_link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="paginate_img_next_link" aria-label="{{ __('pagination.next') }}">
                            <svg class="paginate_img" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="paginate_img_next_not_link" aria-hidden="true">
                                <svg class="paginate_img" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
