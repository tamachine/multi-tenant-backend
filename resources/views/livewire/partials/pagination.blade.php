@if ($paginator->hasPages())
    <div class="container mt-10">
        <nav class="pagination">
            <ul>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                @else
                    <li><button wire:click="previousPage" rel="prev">&laquo;</button></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><button wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach



                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><button wire:click="nextPage" rel="next">&raquo;</button></li>
                @else
                    <li class="disabled"><span>&raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
@endif
