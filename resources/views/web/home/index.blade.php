@extends('layouts.web')

@section('body')
    
    <div class="relative bg-violet-100">
        <x-home.hero />

        <div class="absolute -bottom-6 mx-auto w-full">
            <x-car-search-bar />
        </div>                
    </div>

    <div class="max-w-6xl mx-auto p-3">

        @include('web.home.info')
        
        <div class="px-18">
            <x-heading-h2 title="{{ __('web.home.box1-h2-title') }}" subtitle="{{ __('web.home.box1-h2-subtitle') }}" />
        </div>

        @include('web.home.cards-default')

        <div class="pt-36 pb-6">
            <x-heading-h2 
                title="{{ __('web.home.box2-h2-title') }}" 
                subtitle="{{ __('web.home.box2-h2-subtitle') }}" 
                text-direction="left"
                padding-top="2"
            />
        </div>

        @include('web.home.cards-elongated')

        @include('web.home.deals')

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

            
        </div>
    </div>
    
@endsection