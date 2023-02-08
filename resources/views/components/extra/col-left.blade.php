<div class="grid grid-cols-[96px_1fr] md:grid-cols-[170px_auto] gap-3 md:gap-10 p-3 md:p-8">
    <div class="md-max:h-24">        
        @if(!empty($extra->image_url))
        <img class="rounded-xl md-max:w-24 md-max:h-24 md-max:object-cover" src="{{ $extra->image_url}}" />        
        @endif
    </div>
    <div>
        <div class="font-fredoka-medium text-xl md:text-2xl">{!! $extra->name !!}</div>
        <div class="md-max:hidden text-sm">{!! $extra->description !!}</div>
        <div class="md:hidden flex justify-start items-center gap-1">
            @include('components.extra.price')
        </div>
    </div>       
</div>