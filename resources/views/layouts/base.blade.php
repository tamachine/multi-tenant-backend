<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <x-nav-bar/>
    </head>

    {{-- 
        Horizontal overflow is hidden because w-fill-screen class uses a width=100vw and some browsers include the vertical scrollbar in the full screen size so a horizontal scrollbar is shown if a verticall one is needed.
    --}}
    <body class="max-w-7xl mx-auto overflow-x-hidden">                        
        @yield('body')        

        @livewireScripts

        <x-footer imagePath="{{ $footerImagePath }}" />
    </body>
</html>
