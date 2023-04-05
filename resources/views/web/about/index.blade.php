@extends('layouts.web')

@section('body')

    @include('web.about.partial.hero')

    <div class="px-3 md:px-0 max-w-6xl mx-auto">

        @include('web.about.partial.intro')

        @include('web.about.partial.section1')

        @include('web.about.partial.testimonials')

        @include('web.about.partial.likes')

    </div>

@endsection
