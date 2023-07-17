@extends('layouts.web')

@section('body')        
    
    <main class="max-w-7xl mx-auto px-3 md:px-11">
        
        @include('web.landing-insurances.partial.intro')     
        
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-col-reverse">                
                @include('web.landing-insurances.partial.grid')     

                @include('web.landing-insurances.partial.table')  
            </div>
            
            @include('web.landing-insurances.partial.features') 

        </div>
            
    </main>
    
@endsection

