<div class="flex flex-col md:{{ $tailwindDesktopDirectionClass }}">
    <div 
        class="md:flex-1 rounded-2xl bg-cover {{ $paddingCol2 }}" 
        style="background-image: url('{{ $imagePath }}')">
    </div>
    <div class="md:flex-1 flex flex-col md:{{ $itemsClass }} gap-7">
        <h2 class="md:{{ $textAlign }} {{ $paddingCol1 }}">{!! $title !!}</h2>
        <div class="{{ $paddingCol1 }}">
            <x-read-more-block text="{!! $text !!}" text-align-desktop="{{ $textAlign }}" />    
        </div>
        <button class="tab hidden md:block">Learn more</button>
    </div>
</div>