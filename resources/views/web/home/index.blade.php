@extends('layouts.web')

@section('body')

    <div class="intro relative">
        @include('web.home.partial.hero')
        
        <div class="searcher absolute bottom-[-20px] w-full z-30">
            <x-car-search-bar />
        </div>
    </div>
    
    <div class="max-w-6xl mx-auto p-3">

        @include('web.home.partial.reviews')

        @include('web.home.partial.box1')

        @include('web.home.partial.cards-default')

        @include('web.home.partial.box2')

        @include('web.home.partial.cards-elongated')

        @include('web.home.partial.deals')
        
        @include('web.home.partial.faqs')
        
        <div class="md:px-10">

            @include('web.home.partial.why-iceland')

            @include('web.home.partial.feature1')

            @include('web.home.partial.feature2')

            @include('web.home.partial.testimonials')

            <div class="pt-22 md:pt-56">
                @include('web.home.partial.location-map')
            </div>
        </div>
    </div>
@endsection
