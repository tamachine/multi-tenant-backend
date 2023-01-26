<div>
    @include('web.cars.partial.car-categories')

    @include('web.cars.partial.car-selectables')  

    <x-wire-spinner /> 

    @if(count($cars) > 0)
    <div 
        wire:loading.remove
        class="
            grid 
            
            {{ (count($cars) == 1) ? 'md:grid-cols-[350px]' : ''  }} 
            {{ (count($cars) >= 2) ? 'grid-cols-[repeat(auto-fill,350px)] ' : ''  }} 
            
            {{ (count($cars) == 1) ? 'md:grid-cols-[324px]' : ''  }} 
            {{ (count($cars) == 2) ? 'md:grid-cols-[324px_324px]' : ''  }} 
            {{ (count($cars) == 3) ? 'md:grid-cols-[324px_324px_324px]' : '' }} 
            {{ (count($cars) >= 4) ? 'md:grid-cols-[repeat(auto-fill,324px)] ' : '' }} 

            justify-center
            gap-x-5 gap-y-8 md:gap-y-10 
            ">       
        @foreach($cars as $car)
            <x-car-card :car="$car" />
        @endforeach        
    </div>
    @else
    <div wire:loading.remove class="text-center w-full">
        {!! __('cars.search-not-found') !!}
    </div>
    @endif
</div>