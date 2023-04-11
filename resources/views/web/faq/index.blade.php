@extends('layouts.web')

@section('body')
    <div class="max-w-6xl mx-auto p-3">
        @include('web.faq.partial.breadcrumbs')
        
        @include('web.faq.partial.faqs')

        @include('web.faq.partial.form')
    </div>
@endsection
