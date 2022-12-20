@extends('layouts.web')

@section('body')        
    <div class="bg-[#FCFCFC] w-fill-screen">
        <div class="max-w-7xl mx-auto ">
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />
        </div>
    </div>
@endsection