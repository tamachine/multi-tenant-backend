<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{'showMobileNavBar': false, 'htmlOverflowHidden': false}"
    :class="showMobileNavBar || htmlOverflowHidden ? 'overflow-hidden' : ''"
    x-ref="html"
    >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        <script src="{{ url(mix('js/swiper.js')) }}"></script>
        <script src="{{ url(mix('js/app/scripts.js')) }}"></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <x-nav-bar/>
    </head>

    {{--
        Horizontal overflow is hidden because w-fill-screen class uses a width=100vw and some browsers include the vertical scrollbar in the full screen size so a horizontal scrollbar is shown if a verticall one is needed.
    --}}

    <body
        class="overflow-x-hidden relative"
        x-data="{'showOverlay': false}"
        >

        <div
            id="overlay"
            class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 z-20"
            x-show="showOverlay"
            x-cloak
            >
            <div id="hide-overlay" class="hidden" x-on:click="showOverlay = false"></div> {{-- this is used in the date picker range component in order to hide the overlay from an event --}}
        </div>

        <x-admin.wire-response />

        @yield('intro')

        <div class="max-w-7xl mx-auto">
            @yield('body')

            @livewireScripts

            @if (isset($footerImagePath))
                <x-footer imagePath="{{ $footerImagePath }}" />
            @endif
        </div>

        @stack('scripts')
    </body>
</html>
