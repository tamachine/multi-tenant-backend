@if ($reversed) 
    <div class="flex flex-col md:flex-row-reverse md:text-left">    
        <div 
            class="hidden md:block md:flex-1 md:rounded-2xl md:bg-cover md:ml-16" 
            style="background-image: url('{{ $imagePath }}')">        
        </div>
        <div class="md:hidden md:ml-16 pb-5">        
            <img class="rounded-2xl bg-cover w-full" src="{{ $imagePath }}" />
        </div>

        <div class="md:flex-1 flex flex-col md:items-start gap-7">
            <h2 class="md:text-left">{!! $title !!}</h2>
            <div>
                <x-read-more-block text="{!! $text !!}" text-align-desktop="text-left" />    
            </div>
            <button class="tab hidden md:block">Learn more</button>
        </div>
    </div>
@else
    <div class="flex flex-col md:flex-row md:text-right">    
        <div 
            class="hidden md:block md:flex-1 md:rounded-2xl md:bg-cover" 
            style="background-image: url('{{ $imagePath }}')">        
        </div>
        <div class="md:hidden pb-5">        
            <img class="rounded-2xl bg-cover w-full" src="{{ $imagePath }}" />
        </div>

        <div class="md:flex-1 flex flex-col md:items-end gap-7">
            <h2 class="md:text-right md:pl-16">{!! $title !!}</h2>
            <div class="md:pl-16">
                <x-read-more-block text="{!! $text !!}" text-align-desktop="text-right" />    
            </div>
            <button class="tab hidden md:block">Learn more</button>
        </div>
    </div>
@endif


