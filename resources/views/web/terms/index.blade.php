@extends('layouts.web')

@section('body')
    <div class="bg-white w-fill-screen">
        <div class="mx-auto px-3 md:px-9 max-w-6xl">
            <h2 class="text-pink-red mt-6">
                {!! __('terms.title') !!}
            </h2>

            <span class="mt-6 text-justify text-gray-600 leading-5 space-y-2 text-sm">{!! __('terms.content') !!}</span>
        </div>
    </div>
@endsection
