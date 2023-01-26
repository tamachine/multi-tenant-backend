@extends('layouts.web')

@section('body')        
    <div class="bg-[#FCFCFC] w-fill-screen">  
        <div class="px-3 md:px-0 max-w-7xl mx-auto">  
            @include('web.extras.partial.steps-desktop')

            <x-heading-title title="{!! __('extras.title') !!}" subtitle="{!! __('extras.subtitle') !!}" />
            
            @include('web.extras.partial.steps-mobile')     

            <div class="max-w-6xl py-4 md:py-12">
                <livewire:web.extras :car="$car" />
            </div>
        </div>
    </div>
@endsection