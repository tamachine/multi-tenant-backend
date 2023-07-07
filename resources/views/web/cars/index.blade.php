@extends('layouts.web')

@section('body')        
    <div class="bg-gray-bg-cars w-fill-screen">
        <div class="max-w-7xl mx-auto px-5 md:px-11">
            
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />

            @include('web.cars.partial.title')
                        
            @include('web.cars.partial.car-search-bar')                      

            @isset($dataErrors)            
                @foreach($errors as $key => $error)
                    <div class="w-fill text-center pt-4">{!! __('car-search-bar.date-errors.'.$key) !!}</div>
                @endforeach                
            @else            
                @include('web.cars.partial.car-list')   
            @endisset
                        
            @include('web.cars.partial.car-image') 
            
            @include('web.cars.partial.car-faqs')   
        </div>
    </div>
@endsection