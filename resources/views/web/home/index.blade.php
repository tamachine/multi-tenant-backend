@extends('layouts.web')

@section('body')        
    <div class="relative bg-violet-100">
        @include('web.home.partial.hero')
       
        <div class="absolute md:-bottom-6 md-max:top-[180px]  mx-auto w-full z-30">
            @include('web.home.partial.car-search-bar')
        </div>                
    </div>
    
    <div class="max-w-6xl mx-auto p-3">   
         
        @include('web.home.partial.reviews')
        
        @include('web.home.partial.box1')
    
        @include('web.home.partial.cards-default')

        @include('web.home.partial.box2')

        @include('web.home.partial.cards-elongated')

        @include('web.home.partial.deals')

        <x-faqs />

        <div class="px-10">
            @include('web.home.why-iceland')

            <div class="pt-28 md:pt-40">
                <x-feature 
                    title="{!! __('web.home.feature-1-title') !!}" 
                    text="{!! __('web.home.feature-1-text') !!}" 
                    image-path="{{ asset('images/home/feature-1.png') }}"                 
                    />
            </div>

            <div class="pt-28 md:pt-40">
                <x-feature 
                    title="{!! __('web.home.feature-2-title') !!}" 
                    text="{!! __('web.home.feature-2-text') !!}" 
                    image-path="{{ asset('images/home/feature-2.png') }}"     
                    reversed="true"
                    />
            </div>

            @include('web.home.testimonials')
            
            <div class="pt-22 md:pt-56">
                @include('web.home.location-map')
            </div>
        </div>
    </div>
    
    
@endsection