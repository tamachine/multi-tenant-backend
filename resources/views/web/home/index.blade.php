@extends('layouts.base')

@section('body')
    
    <div class="relative">
        <x-home.hero />

        <div class="absolute -bottom-6 mx-auto w-full">
            <x-car-search-bar />
        </div>
    </div>
    
@endsection