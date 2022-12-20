@extends('layouts.web')

@section('body')        
    <div class="bg-[#FCFCFC] w-fill-screen">
        <div class="max-w-7xl mx-auto ">
            
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />

            <div class="hidden md:block">
                <x-heading-h1 title="{!! __('cars.title') !!}" text="{!! __('cars.subtitle') !!}" :small-text="true"/>            
            </div>
        </div>
    </div>
@endsection