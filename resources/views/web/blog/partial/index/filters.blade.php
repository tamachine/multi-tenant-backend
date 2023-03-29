<div class="flex flex-col gap-3 mb-20 mt-14 md:mb-14 {{ $hero->count() > 0 ? 'md:mt-10' : 'md:mt-20' }}">
    <div class="font-fredoka-semibold text-lg">{!! __('blog.view-by-category') !!}</div>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-7 md:gap-[10px]">
        @include('web.blog.partial.index.categories')
    
        @include('web.blog.partial.index.search')
    </div>
</div>