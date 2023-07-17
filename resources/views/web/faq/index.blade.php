@extends('layouts.web')

@section('body')
    <div class="max-w-7xl mx-auto px-5 md:px-11">    
        @include('web.faq.partial.breadcrumbs')
        
        @include('web.faq.partial.faqs')

        @include('web.faq.partial.form')
    </div>
@endsection
