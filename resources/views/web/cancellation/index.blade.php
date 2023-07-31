@extends('layouts.web')

@section('body')
    <div class="px-5 md:px-0 max-w-6xl mx-auto">
        <h1 class="text-left text-3xl md:text-4xl lg:text-5xl leading-tight my-12">
            {!! __('cancellation.title') !!}
        </h1>

        <span class="text-justify text-[#84878B] leading-5">{!! __('cancellation.content') !!}</span>
       
    </div>
@endsection
