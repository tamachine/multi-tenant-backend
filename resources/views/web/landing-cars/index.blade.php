@extends('layouts.web')

@section('body')        
    <div class="w-fill-screen mt-5">
        <main class="max-w-7xl mx-auto px-3 md:px-11">
            
            @include('web.landing-cars.partial.hero')

            <livewire:web.car-search-results 
                :showFilters="false" 
                :showImageIfLittleResults="true" 
                :categories="$categories" 
                />

            @include('web.landing-cars.partial.testimonials')

            @include('web.landing-cars.partial.about')

            @include('web.landing-cars.partial.brands')

            @include('web.landing-cars.partial.other-landings')            

            @include('web.home.partial.faqs')
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        initSwiper(
            '#testimonials__swiper', 
            {
                slidesPerView: 1,
                spaceBetween: 60,

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            },
        );

    </script>
@endpush