@extends('layouts.web')

@section('body')        
    <div class="bg-[#FCFCFC] w-fill-screen">
        <div class="max-w-7xl mx-auto px-3">
            <livewire:web.car-search-results :showFilters="false" : showImageIfLittleResults="true" :categories="$categories" />             
        </div>
    </div>
@endsection