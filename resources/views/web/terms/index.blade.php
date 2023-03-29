@extends('layouts.web')

@section('body')
    <div class="px-3 md:px-0 max-w-6xl mx-auto">
        <h2 class="text-pink-red font-fredoka-semibold py-12">
            {!! __('terms.title') !!}
        </h2>

        <span class="text-justify text-[#84878B] leading-5">{!! __('terms.content') !!}</span>
       
    </div>
@endsection
