@extends('layouts.web')

@section('body')    
    <div class="px-3 md:px-0 max-w-6xl mx-auto">
        <livewire:web.blog-search-category :blogCategorySlug="$category->slug" />                       
    </div>
@endsection