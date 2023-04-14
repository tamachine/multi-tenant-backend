@extends('layouts.web')

@section('body')        
    <div class="w-fill-screen">
        <main class="max-w-7xl mx-auto px-11">

            <div class="relative">
                <div class="rounded-2xl ">
                    <picture>
                        <img class="rounded-2xl" src="{{ asset('/images/landing-cars/small-medium-cars.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="absolute top-0 left-0 bottom-0 w-full p-20">
                    <h1 class="max-w-4xl text-[4rem] text-white mx-auto">{!! __('landing-cars.'. $type . '-title') !!}</h1>
                </div>
            </div>
            
            <div class="max-w-4xl mx-auto mt-20 mb-20 text-center">
                <p class="text-[1.25rem]">{!! __('landing-cars.'. $type . '-text') !!}</p>
            </div>

            {{-- <livewire:web.car-search-results :showFilters="false" : showImageIfLittleResults="true" :categories="$categories" />              --}}
        </main>
    </div>
@endsection