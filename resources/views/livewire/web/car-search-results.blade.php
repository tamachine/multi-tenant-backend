<div>
    @if($showFilters)
        @include('web.cars.partial.car-categories')

        @include('web.cars.partial.car-selectables')  

        <x-wire-spinner /> 
    @endif

    <div class="flex gap-x-5">
        @if(count($cars) > 0)
            <div 
                wire:loading.remove
                class="w-full max-w-6xl mx-auto gap-x-5 gap-y-8
                    
                    @if(count($cars) <= 3) 
                        flex justify-center
                    @endif

                    @if($cars->count() == 4 && $showImageIfLittleResults) 
                        grid justify-center basis-0 grow
                        sm:grid-cols-[repeat(2,_minmax(230px,_1fr))] lg:grid-cols-[repeat(2,_minmax(280px,_1fr))]
                    @endif

                    @if(count($cars) > 4 || (count($cars) == 4 && $showImageIfLittleResults == 0)) 
                        grid justify-center 
                        sm:grid-cols-[repeat(auto-fit,_minmax(278px,_1fr))]
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
    </div>
</div>