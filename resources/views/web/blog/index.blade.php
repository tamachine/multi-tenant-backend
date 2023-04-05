@extends('layouts.web')

@section('body')
    <div class="md:px-0 max-w-6xl mx-auto">


        @include('web.blog.partial.index.hero')

        @include('web.blog.partial.index.filters')

        @include('web.blog.partial.index.latest')

        @include('web.blog.partial.index.top10')

        @include('web.blog.partial.index.image')

        @include('web.blog.partial.index.postsByCategory')

        @include('web.blog.partial.index.newsletter')
        
    </div>
@endsection