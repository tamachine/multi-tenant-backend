@if ($paginator->hasPages())
    <ul class="flex justify-around md:justify-center items-center gap-3 text-[#bcbcbc] font-fredoka-medium text-xl" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage() || $paginator->onLastPage())
            <li class="disabled" aria-disabled="true" aria-label=" < ">
                <span class="px-7 py-6 rounded-md disabled border" aria-hidden="true">
                    < 
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" type="button" class="px-7 py-4 rounded-md border text-pink-red" wire:click="previousPage" rel="prev" aria-label=" < ">
                    < 
                </a>
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

                        @if ($paginator->onFirstPage())
                            @if($paginator->nextPageUrl() == $url)
                            <li class="px-7 py-4 hover:text-pink-red cursor-pointer"><a href="{{ $paginator->url(2) }}" type="button" wire:click.prevent="gotoPage({{ 2 }})">2</a></li> 
                            @else  
                            <li class="px-7 py-4" aria-disabled="true"><span>...</span></li>
                            @break
                            @endif
                        @elseif($paginator->onLastPage())

                            @if($paginator->previousPageUrl() == $url)
                            <li class="px-7 py-4" aria-disabled="true"><span>...</span></li>
                            @endif

                            @if($paginator->url(1) == $url || $paginator->previousPageUrl() == $url)
                            <li class="px-7 py-4 hover:text-pink-red cursor-pointer"><a href="{{ $paginator->url($page) }}" type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a></li>   
                            @endif

                        @elseif($paginator->currentPage() == 2)
                            @if($paginator->previousPageUrl() == $url || $paginator->nextPageUrl() == $url)
                            <li class="px-7 py-4 hover:text-pink-red cursor-pointer"><button type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</button></li>
                            @endif
                        @else
                            <li class="px-7 py-4 hover:text-pink-red cursor-pointer"><a href="{{ $paginator->url($page) }}" type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a></li>
                        @endif
                        
                    @endif
                @endforeach
            @endif
        @endforeach
 
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" type="button" class="px-7 py-4 rounded-md border text-pink-red" wire:click="nextPage" rel="next" aria-label=" > ">
                    > 
                </a>
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