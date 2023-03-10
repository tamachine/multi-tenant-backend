@extends('layouts.web')

@section('intro')
    <div class="h-screen bg-cover flex content-center bg-about">
        <div class="max-w-6xl m-auto">
            <h1 class="text-white title-shadow">
                {!! __('about.title') !!}
            </h1>
        </div>
    </div>
@endsection

@section('body')
    <div class="bg-white w-fill-screen">
        @include('web.about.partial.intro')

        @include('web.about.partial.our-section')

        @include('web.about.partial.testimonials')

        @include('web.about.partial.like-section')
    </div>
@endsection
