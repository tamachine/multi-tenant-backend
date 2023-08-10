<!DOCTYPE html>
<html lang="{{ app('getHTMLLang')  }}">
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#E11166" >
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="preload" href="/css/preload.css" as="style" /> {{-- Hoja de estilos de la precarga --}}
        <link href="/css/app.css" rel="stylesheet">
       
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        <script src="{{ url(mix('js/swiper.js')) }}"></script>
        <script src="{{ url(mix('js/app/scripts.js')) }}"></script>

        {{-- app locale --}}
        <input type="hidden" id="app_locale" value="{{ App::getLocale() }}">

        <x-nav-bar/>        
    </head>

    <body>       

        <div class="max-w-7xl mx-auto">
            @yield('body')            

            @if (isset($footerImagePath))
                <x-footer imagePath="{{ $footerImagePath }}" />
            @endif
        </div>

        @stack('scripts')
    </body>
</html>
