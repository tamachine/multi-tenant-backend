@extends('layouts.web')

@section('intro')
    <div class="bg-not-found">
        <div class="hidden lg:flex max-w-6xl mx-auto px-10">
            <div class="text-[220px] text-white font-fredoka-semibold">
                404
            </div>

            <div class="mt-28 ml-10 max-w-md">
                <div class="text-lg text-white title-shadow">
                    {!! __('not-found.title') !!}
                </div>

                <div class="mt-6">
                    <div class="btn btn-red w-48 text-white font-sans-bold py-2 px-2 text-lg text-center cursor-pointer"
                        href="{{route("home")}}"
                        onclick='window.location.href="{{route("home")}}"'
                    >
                        {!! __('not-found.button') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="h-full flex flex-col justify-between lg:hidden">
            <div class="text-center">
                <div class="text-[120px] text-white font-fredoka-semibold">
                    404
                </div>

                <div class="w-4/5 mx-auto text-lg text-white title-shadow">
                    {!! __('not-found.title') !!}
                </div>
            </div>

            <div class="mx-auto mb-12">
                <div class="btn btn-red w-48 text-white font-sans-bold py-2 px-2 text-lg text-center cursor-pointer"
                    href="{{route("home")}}"
                    onclick='window.location.href="{{route("home")}}"'
                >
                    {!! __('not-found.button') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
