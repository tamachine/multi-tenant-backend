@extends('layouts.web')

@section('body')
    <div class="bg-white w-fill-screen">
        <div class="max-w-7xl mx-auto px-3">
            @include('web.contact.partial.title')

            @include('web.contact.partial.form')

            @include('web.contact.partial.newsletter')
        </div>
    </div>
@endsection
