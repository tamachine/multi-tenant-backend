@extends('layouts.web')

@section('body')    
    <div class="px-5 md:px-0 max-w-6xl mx-auto relative" x-data="blogPagination()" @scroll.window="scrolling()">                
        
        <x-breadcrumb :breadcrumbs="$breadcrumbs"/>

        @include('web.blog.partial.show.image')

        @include('web.blog.partial.show.title')
       
        @include('web.blog.partial.show.content')
        
        @include('web.blog.partial.show.pagination')

        @include('web.blog.partial.show.newsletter')

        @include('web.blog.partial.show.related')
        
    </div>
@endsection
