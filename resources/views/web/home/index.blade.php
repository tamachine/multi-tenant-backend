@extends('layouts.base')

@section('body')
    
    <div class="relative bg-violet-100">
        <x-home.hero />

        <div class="absolute -bottom-6 mx-auto w-full">
            <x-car-search-bar />
        </div>                
    </div>

    <div class="max-w-6xl mx-auto">

        @include('web.home.info')
        
        <div class="px-22">
            <x-heading-h2 title="{{ __('web.home.box1-h2-title') }}" subtitle="{{ __('web.home.box1-h2-subtitle') }}" />
        </div>

    </div>
    

@endsection