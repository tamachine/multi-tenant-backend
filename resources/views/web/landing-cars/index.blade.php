@extends('layouts.web')

@section('body')        
    <div class="w-fill-screen">
        <main class="max-w-7xl mx-auto px-3 md:px-11">
            <section id="intro">
                <div class="relative min-h-[125vw] md:min-h-[650px]">    
                    <div class="absolute w-full top-0 bottom-0 left-0 rounded-2xl image-wrapper">
                        <picture>
                            <source srcset="{{ asset('/images/landing-cars/' . $type . '-cars_dk.jpg') }}" media="(min-width: 767px)">
                            <source srcset="{{ asset('/images/landing-cars/' . $type . '-cars_mb.jpg') }}">
                            <img src="{{ asset('/images/landing-cars/' . $type . '-cars_dk.jpg') }}" alt="">
                        </picture>
                    </div>
                    <div class="relative px-5 py-10 md:p-20">
                        <h1 class="max-w-4xl text-white mx-auto">{!! __('landing-cars.'. $type . '-title') !!}</h1>
                    </div>
                </div>
                <div class="intro__description max-w-4xl mx-auto mt-5 mb-20 md:mt-10 text-center">
                    <p class="text-xl leading-loose">{!! __('landing-cars.'. $type . '-text') !!}</p>
                </div>
            </section>

            {{-- <livewire:web.car-search-results :showFilters="false" : showImageIfLittleResults="true" :categories="$categories" />              --}}
            
            <swiper-container id="testimonials" class="w-fill-screen md:w-full md:left-0 my-28 md:my-36">
                @foreach(range(0, 4) as $testimonial)
                    <swiper-slide class="relative">
                        <div class="testimonials__image relative md:absolute md:top-0 md:left-0 w-[90%] md:w-3/5 md:h-full m-auto z-10 md:z-0 rounded-2xl image-wrapper">
                            <img class="md:absolute md:top-0 md:right-0 md:bottom-0 md:left-0" src="{{ asset('/images/landing-cars/testimonial.jpg') }}" alt="">
                        </div>
                        <div class="testimonials__content 
                                relative flex flex-col gap-5 bg-pink-red-secondary rounded-2xl
                                w-fill-screen md:w-1/2 md:left-0
                                px-6 pt-20 pb-8 md:p-12
                                mt-[-45px] ml-auto md:mt-32 md:mb-32">
                            <h3 class="uppercase text-pink-red font-bold text-left text-lg">{!! __('landing-cars.testimonials-title') !!}</h3>
                            <h2 class="font-bold text-black text-3xl md:text-5xl leading-tight	">“Et officiis omnis unde suscipit rem et omnis rem laboriosam iure”</h2>
                            <p class="font-bold text-base md:text-2xl before:content-['-'] before:mr-2">Esther Molina</p>
                            <div class="testimonials__reviews flex gap-2 items-center flex-nowrap overflow-auto py-5">
                                <p class="text-xs font-bold">{!! __('landing-cars.testimonials-value') !!}</p>
                                <div class="flex gap-0.5">
                                    @foreach(range(0, 4) as $item)
                                        <div class="bg-[#219653] w-[20px] p-1">
                                            <img class="brightness-0 invert" src="{{ asset('/images/logos/trustpilot-icon.svg') }}" alt="Estrella Trustpilot">
                                        </div>
                                    @endforeach
                                </div>
                                <p class="text-xs whitespace-nowrap"><strong class="font-bold">436</strong> {!! __('landing-cars.testimonials-reviews') !!}</p>
                                <img class="w-[80px]" src="{{ asset('/images/logos/trustpilot.svg') }}" alt="Logo Trustpilot">
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>

            <section id="about" class="md:flex gap-10 my-28 md:my-36">
                <div class="about__image md:w-[44%] rounded-2xl order-1 image-wrapper">
                    <img src="{{ asset('/images/landing-cars/about-car-renting.jpg') }}" alt="">
                </div>
                <div class="about__content md:w-[56%] my-5">
                    <x-read-more-block text="{!! __('landing-cars.about-text') !!}" image-path="/images/icons/arrow-up-solid.svg"/>
                    
                    <a class="btn-border" href="">{{ __('landing-cars.about-button') }}</a>
                </div>
                
            </section>

            <section id="brands" class="my-28 md:my-36">
                <div class="brand__image w-fill-screen h-[600px] md:h-fit image-wrapper">
                    <img class="object-[80%-50%]" src="{{ asset('/images/landing-cars/small-cars-brands.jpg') }}" alt="">
                </div>
                <div class="brands__content md:flex gap-20 mt-10">
                    <div class="brands__text md:w-1/2 mb-10 md:mb-0">
                        <h2 class="mb-5">{{ __('landing-cars.brands-title') }}</h2>
                        <p>{!! __('landing-cars.brands-text') !!}</p>
                        <a class="btn-border hidden md:inline-block" href="">{{ __('landing-cars.brands-button') }}</a>
                    </div>
                    @php
                        $brands = [
                            'kia',
                            'toyota',
                            'suzuki',
                            'dacia',
                            'jeep',
                            'mercedes-benz',
                            'tesla',
                            'land-rover',
                            'subaru',
                        ]
                    @endphp
                    <div class="brands__logos md:w-1/2 grid grid-cols-3 gap-5 md:gap-x-14 md:gap-y-10 justify-items-center">
                        @foreach($brands as $brand)
                            <img src="/images/logos/{{ $brand }}.svg" alt="Logo {{ $brand }}">
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="categories mt-28 md:mt-36">
                <h2 class="mb-8">Different vehicles for all type of adventures</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 w-100 gap-6">
                    @foreach (range(0, 2) as $category)
                        <article class="category relative flex flex-col justify-end min-h-[600px] md:min-h-[400px]">
                            <div class="category__image absolute w-full top-0 bottom-0 left-0 rounded-2xl image-wrapper gradient-pink">
                                <img class="" src="{{ asset('/images/landing-cars/image-'. $category .'.jpg') }}" alt="">
                            </div>
                            <div class="relative category__content  px-5 py-7">
                                <h5 class="font-fredoka-semibold text-3xl text-white text-left font-semibold mb-3">Premium vehicles</h5>
                                <p class="text-white">Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.</p>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="categories__button hidden md:inline-block w-full text-center mt-5">
                    <button class="inline-block">
                        <span class="text-lg font-bold">View more</span>
                        <img class="mx-auto" src="{{ asset('/images/icons/view-more.svg') }}" alt="">
                    </button>
                </div>
            </section>

            @include('web.home.partial.faqs')
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        initSwiper(
            '#testimonials', 
            {
                slidesPerView: 1,
                spaceBetween: 60,
            
                navigation: {
                    nextEl: '.next',
                    prevEl: '.prev',
                },
            },
        );

    </script>
@endpush