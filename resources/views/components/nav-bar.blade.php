<nav x-data="visibilitySelector()" @languageSelector-show="show()"   class="flex items-center justify-between flex-wrap p-3 md:px-20 md:py-5 border md:border-0 border-[#E7ECF3] bg-white relative z-50">
    <div class="font-fredokaOne text-pink-red font-normal text-3xl leading-9  ">{{ __('web.general.brand') }}</div>

    {{-- mobile --}}
    <div 
        class="cursor-pointer md:hidden "    
        x-on:click="showMobileNavBar = !showMobileNavBar"
        >
        <div x-show="!showMobileNavBar">
            <span>{!! __('web.navbar.open') !!}</span>
            <img src="{{ asset('images/icons/menu.svg') }}" class="inline" />
        </div>

        <div x-cloak x-show="showMobileNavBar">
            <span>{!! __('web.navbar.close') !!}</span>    
            <img src="{{ asset('images/icons/menu-close.svg') }}" class="inline" />
        </div>    
    </div>    
    {{-- mobile end --}}

    {{-- desktop --}}
    <div class="hidden md:flex items-center divide-x gap-10">
        <div class="flex items-end justify-between flex-wrap gap-10 text-lg font-sans-medium">
            <a href="#" class="hover:text-pink-red">{{ __('web.navbar.cars') }}</a>
            <a href="#" class="hover:text-pink-red">{{ __('web.navbar.about') }}</a>
            <a href="#" class="hover:text-pink-red">{{ __('web.navbar.faq') }}</a>
            <a href="#" class="hover:text-pink-red">{{ __('web.navbar.blog') }}</a>
            <a href="#" class="hover:text-pink-red">{{ __('web.navbar.contact') }}</a>
        </div>
        <div class="pl-5 text-sm font-medium flex items-center gap-1" x-on:click="toggle()">
            <img class="inline" src='{{ asset("/images/currencies/dollar.svg") }}' />
            <img class="inline" src='{{ asset("/images/flags/".App::currentLocale().".svg") }}' />
            <img class="cursor-pointer" src="{{ asset('images/icons/arrow-down.svg') }}" />
        </div>
    </div>
    {{-- desktop end --}}

    <div 
        class="md-max:hidden md:absolute top-[76px] right-16 z-50"
        x-cloak 
        x-show="visibility()"
        >
        <x-language-selector />
    </div>
</nav>


{{-- mobile --}}
<div 
    x-cloak 
    class="
        md:hidden fixed w-screen top-[60px] left-0 h-[calc(100vh_-_20px)] {{-- the screen, minus 60px for the top position, plus 20px for every bottom line (red and black) so -60 +20 +20 = 100vh -20px --}}
        bg-white z-40 overflow-hidden"
    x-show="showMobileNavBar"  
    x-transition:enter="transition ease-out duration-700"
    x-transition:enter-start="transform -translate-y-full opacity-[90%]"
    x-transition:enter-end="transform translate-y-0 opacity-full"

    x-transition:leave="transition ease-out duration-700"
    x-transition:leave-start="transform translate-y-0 opacity-full"
    x-transition:leave-end="transform -translate-y-full opacity-[90%]"
    x-data="visibilitySelector()"
    >
    <div class="flex flex-col h-full justify-between">
        <div class="h-full">
            <div class="flex flex-col divide-y h-full">
                <div class="h-full p-9 pb-0 flex flex-col items-center justify-between">
                    <div class="grid grid-cols-2 justify-center items-center text-center gap-y-8 gap-x-9">
                        <div>
                            <img src="{{ asset('images/cars/categories/small-medium.png') }}" class="mx-auto" />
                            <span>Small - Medium</span>
                        </div>
                        <div>
                            <img src="{{ asset('images/cars/categories/large.png') }}" class="mx-auto" />
                            <span>Large</span>
                        </div>
                        <div>
                            <img src="{{ asset('images/cars/categories/4x4.png') }}" class="mx-auto" />
                            <span>4x4</span>
                        </div>
                        <div>
                            <img src="{{ asset('images/cars/categories/premium.png') }}" class="mx-auto" />
                            <span>Premium</span>
                        </div>
                        <div>
                            <img src="{{ asset('images/cars/categories/minivans.png') }}" class="mx-auto" />
                            <span>Mini vans</span>
                        </div>
                        <div>
                            <button class="btn font-fredoka font-medium text-sm text-black-primary p-4 border border-[#E7ECF3] cursor-pointer">{!! __('web.navbar.cars-button') !!}</button>
                        </div>
                    </div>
                    <div class="text-center text-pink-red font-fredoka font-semibold text-[26px] py-5 h-full flex items-center justify-center">
                        {!! __('web.navbar.cars-title') !!}
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between flex-wrap text-xl font-fredoka font-medium">                        
                        <a href="#">{{ __('web.navbar.about') }}</a>
                        <a href="#">{{ __('web.navbar.faq') }}</a>
                        <a href="#">{{ __('web.navbar.blog') }}</a>
                        <a href="#">{{ __('web.navbar.contact') }}</a>
                    </div>
                </div>
                <div class="font-fredoka font-semibold text-center pt-5 pb-10">
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex flex-col justify-center items-center gap-3" x-on:click="open()">
                            <div class="text-[#B1B5C3]">{!! __('web.general.languages-language') !!}</div>
                            <div class="flex justify-center gap-2">
                                <img src="{{ asset('images/flags/'.App::getLocale().'.svg') }}" /> 
                                <span class="text-black-primary font-sans font-medium">{!! __('web.general.languages-'.App::getLocale()) !!}</span>
                                <img class="cursor-pointer" src="{{ asset('images/icons/arrow-down.svg') }}" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center gap-3" x-on:click="open()">
                            <div class="text-[#B1B5C3]">{!! __('web.general.languages-currency') !!}</div>
                            <div class="flex justify-center gap-2">
                                <img class="inline" src="{{ asset('images/currencies/usd-red.svg') }}" /> 
                                <span class="text-black-primary font-cabin-semibold">USD</span>
                                <img class="cursor-pointer" src="{{ asset('images/icons/arrow-down.svg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <div class="bg-pink-red w-full h-5"></div>
        <div class="bg-black-primary w-full h-5"></div>
    </div>

    <div 
        class="md:hidden fixed w-screen top-[60px] left-0 h-[calc(100vh_-_20px)]" {{-- the screen, minus 60px for the top position, plus 20px for every bottom line (red and black) so -60 +20 +20 = 100vh -20px --}}
        x-cloak 
        x-show="visibility()"

        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="transform -translate-y-full opacity-[90%]"
        x-transition:enter-end="transform translate-y-0 opacity-full"

        x-transition:leave="transition ease-out duration-700"
        x-transition:leave-start="transform translate-y-0 opacity-full"
        x-transition:leave-end="transform -translate-y-full opacity-[90%]"
        >
        <x-language-selector />
    </div>

</div>
{{-- mobile end --}}