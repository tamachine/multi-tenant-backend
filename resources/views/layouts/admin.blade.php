<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{config('app.name')}} {{ $title ? ' - ' . $title : '' }}</title>

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/admin.js') }}" defer></script>
    </head>

    <body>
        <x-admin.wire-response />

        <div class="h-screen flex overflow-hidden bg-white" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
            <x-admin.sidebar/>

            <!-- Main column -->
            <div class="flex flex-col w-0 flex-1 overflow-hidden">

                <!-- Mobile header -->
                <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 xl:hidden">
                    <button x-description="Sidebar toggle, controls the 'sidebarOpen' sidebar state." @click.stop="sidebarOpen = true" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-700 xl:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                        </svg>
                    </button>

                    <div class="flex-1 flex justify-end px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center">
                            <!-- Profile dropdown -->
                            <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                                <div>
                                    <button @click="open = !open" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-700" id="user-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                                        {{ auth()->user()->name }}
                                        <span class="sr-only">Open user menu</span>
                                    </button>
                                </div>
                                <div x-show="open" x-description="Profile dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" style="display: none;">
                                    <div class="py-1" role="none">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none bg-gray-200" tabindex="0" x-data="" x-init="$el.focus()">
                    <!-- Page title & actions -->
                    <div class="bg-blue-500 h-auto md:h-20 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                        <div class="flex-1 min-w-0">
                            <h1 class="text-lg font-medium leading-6 text-gray-100 sm:truncate">
                                {{ $breadcrumbs ?? '' }}
                                {{ $title ?? '' }}
                            </h1>
                        </div>

                        {{ $action ?? '' }}
                        {{ $backTo ?? '' }}
                    </div>

                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('scripts')

        @livewireScripts
    </body>
</html>
