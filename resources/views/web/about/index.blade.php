@extends('layouts.web')

@section('body')
    <div class="bg-white w-fill-screen">
        @include('web.about.partial.intro')

        @include('web.about.partial.our-section')

        @include('web.about.partial.testimonials')

        @include('web.about.partial.like-section')
    </div>
@endsection
