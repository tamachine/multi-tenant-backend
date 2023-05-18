@if ($reversed) 
    <div class="flex flex-col md:flex-row-reverse md:text-left gap-5">    
        <div class="image-wrapper hidden md:block md:flex-1 md:rounded-2xl md:ml-16">      
            <img src="{{ $imagePath }}" alt="">  
        </div>
        <h2 class="md:hidden block md:text-left">{!! $title !!}</h2>
        <div class="md:hidden md:ml-16 md:pb-5">        
            <img class="rounded-2xl bg-cover w-full" src="{{ $imagePath }}" />
        </div>

        <div class="md:flex-1 flex flex-col md:items-start gap-7">
            <h2 class="hidden md:block md:text-left">{!! $title !!}</h2>
            <div>
                <x-read-more-block text="{!! $text !!}" />    
            </div>
            <button class="tab hidden md:block">{!! __('home.feature-more') !!}</button>
        </div>
    </div>
@else
    <div class="flex flex-col md:flex-row md:text-right">    
        <div class="image-wrapper hidden md:block md:flex-1 md:rounded-2xl">  
            <img src="{{ $imagePath }}" alt="">        
        </div>
        <div class="md:hidden pb-5">        
            <img class="rounded-2xl bg-cover w-full" src="{{ $imagePath }}" />
        </div>

        <div class="md:flex-1 flex flex-col md:items-end gap-7">
            <h2 class="md:text-right md:pl-16 md:pr-0 pr-28">{!! $title !!}</h2>
            <div class="md:pl-16">
                <x-read-more-block text="{!! $text !!}" :reverse-text-align=true />    
            </div>
            <button class="tab hidden md:block">{!! __('home.feature-more') !!}</button>
        </div>
    </div>
@endif



