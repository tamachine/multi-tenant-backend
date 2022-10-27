@extends('layouts.base')

@section('body')
    
    <div class="relative bg-violet-100">
        <x-home.hero />

        <div class="absolute -bottom-6 mx-auto w-full">
            <x-car-search-bar />
        </div>                
    </div>

    @include('web.home.info')
       
@endsection