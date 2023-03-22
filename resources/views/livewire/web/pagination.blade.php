@if ($paginator->hasPages())
    <ul class="flex justify-around md:justify-center items-center gap-3 text-[#bcbcbc] font-fredoka-medium text-xl" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label=" < ">
                <span class="px-7 py-6 rounded-md disabled border" aria-hidden="true">
                    < 
                </span>
            </li>
        @else
            <li>
                <button type="button" class="px-7 py-4 rounded-md border text-pink-red" wire:click="previousPage" rel="prev" aria-label=" < ">
                    < 
                </button>
            </li>
        @endif
 
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="px-7 py-4" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif
 
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="px-7 py-4 text-pink-red" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li class="px-7 py-4"><button type="button" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                    @endif
                @endforeach
            @endif
        @endforeach
 
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <button type="button" class="px-7 py-4 rounded-md border text-pink-red" wire:click="nextPage" rel="next" aria-label=" > ">
                    > 
                </button>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label=" > ">
                <span class="px-7 py-4 rounded-md disabled border" aria-hidden="true">
                    > 
                </span>
            </li>
        @endif
    </ul>
@endif