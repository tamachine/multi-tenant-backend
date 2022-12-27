@extends('layouts.web')

@section('body')        
    <div class="bg-[#FCFCFC] w-fill-screen">
        <div class="max-w-7xl mx-auto px-3">
            
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />

            @include('web.cars.partial.title')
                        
            @include('web.cars.partial.car-search-bar')

            @include('web.cars.partial.car-categories')

            @include('web.cars.partial.car-selectables')            

            @include('web.cars.partial.car-list')               

            @include('web.cars.partial.car-image') 
            
            @include('web.cars.partial.car-faqs')   
        </div>
    </div>
@endsection