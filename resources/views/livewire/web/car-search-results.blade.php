<div x-data="{redirecting: false}">
    @if($showFilters)
        @include('web.cars.partial.car-categories')

        @include('web.cars.partial.car-selectables')  
        <div x-show="!redirecting">
            <x-wire-spinner x-show="!redirecting"/> 
        </div>
    @endif
<<<<<<< HEAD

    <div class="cars__list flex md:gap-x-6
            @if ($widthFillScreen)
                w-fill-screen 
                2xl:max-w-screen-2xl
                2xl:left-[calc((100%_-_1536px)_/_2)]
            @endif
        ">
        @if(count($cars) > 0)
            <div wire:loading.remove
                class="gap-x-5 gap-y-8 md:px-10 mx-auto

                    {{-- 
                        1 coche 
                        2 coches 
                    --}}
                    @if(count($cars) <= 2) 
                        flex flex-wrap justify-center
                    @endif

                    {{-- 
                        3 coches
                    --}}
                    @if(count($cars) == 3) 
                        grid justify-center
                        sm:grid-cols-[repeat(2,_minmax(300px,_1fr))] lg:grid-cols-[repeat(3,_minmax(300px,_1fr))]
                    @endif

                    {{-- 
                        4 coches con imagen
                    --}}
                    @if($cars->count() == 4 && $showImageIfLittleResults) 
                        grid justify-center basis-0 grow
                        sm:grid-cols-[repeat(2,_minmax(300px,_1fr))]
                    @endif

                    {{-- 
                        4 coches sin imagen
                        > 4 coches 
                    --}}
                    @if(count($cars) > 4 || (count($cars) == 4 && $showImageIfLittleResults == 0)) 
                        grid justify-center basis-0 grow
                        sm:grid-cols-[repeat(2,_minmax(300px,_1fr))]
                        lg:grid-cols-[repeat(auto-fit,_minmax(310px,_1fr))]
                    @endif
                    
                    ">
                @foreach($cars as $car)
                    <x-car-card :car="$car" />
                @endforeach        
            </div>

            @if(count($cars) == 4 && $showImageIfLittleResults) 
                <div class="relative hidden lg:inline-block w-1/3 image-wrapper rounded-2xl">
                    <img class="absolute top-[-50%] left-[-50%] translate-x-[50%] translate-y-[50%]" src="{{ asset('/images/landing-cars/road.jpg') }}" alt="">
                </div>
            @endif
        
        @else
            <div wire:loading.remove class="text-center w-full">
                {!! __('cars.search-not-found') !!}
            </div>
        @endif
=======
    
    @if(count($cars) > 0)

    {{-- Livewire redirection is fired after the request has ended so we control the loading of the spinner manually in order to avoid the flickering caused by this --}}
    <x-spinner x-cloak x-show="redirecting" />
    
    <div 
        x-show="!redirecting"
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
    <div x-show="!redirecting" wire:loading.remove class="text-center w-full">
        {!! __('cars.search-not-found') !!}
>>>>>>> 0708b3a10e2df30833a0fe8333c893d62c551877
    </div>
</div>