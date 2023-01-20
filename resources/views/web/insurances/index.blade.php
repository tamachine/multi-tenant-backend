@extends('layouts.web')

@section('body')        
    <div class="px-7 md:px-0 max-w-7xl mx-auto">  
        @include('web.insurances.partial.steps-desktop')
        
        <div class="max-w-6xl mx-auto px-0 md:px-9">
            @include('web.insurances.partial.title')           

            @include('web.insurances.partial.steps-mobile')

            @include('web.insurances.partial.table')
        </div>
    </div>
@endsection