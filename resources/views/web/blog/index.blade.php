@extends('layouts.web')

@section('body')        
    <div class="px-3 md:px-0 max-w-6xl mx-auto">
        @include('web.blog.partial.hero')

        @include('web.blog.partial.filters')

        @include('web.blog.partial.latest')

        @include('web.blog.partial.top10')

        @include('web.blog.partial.image')

        @include('web.blog.partial.postsByCategory')

        @include('web.blog.partial.newsletter')
        
    </div>
@endsection