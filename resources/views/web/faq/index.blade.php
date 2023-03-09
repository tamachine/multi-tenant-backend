@extends('layouts.web')

@section('body')
    <div class="bg-white w-fill-screen">
        <x-faqs title="h1" class="mt-16 mx-4 md:mx-0" />

        @include('web.faq.partial.form')
    </div>
@endsection
