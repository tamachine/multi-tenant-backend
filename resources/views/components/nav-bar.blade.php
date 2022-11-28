<nav class="flex items-center justify-between flex-wrap p-3 md:px-20 md:py-5 border md:border-0 border-[#E7ECF3] bg-white relative z-50">
    <div class="font-fredokaOne text-pink-red font-normal text-3xl leading-9  ">{{ __('web.general.brand') }}</div>

    {{-- mobile --}}
    <div 
        class="cursor-pointer md:hidden "    
        x-on:click="showMobileNavBar = !showMobileNavBar"
        >
        <div x-show="!showMobileNavBar">
            <span>menu</span>
            <img src="{{ asset('images/icons/menu.svg') }}" class="inline" />
        </div>

        <div x-cloak x-show="showMobileNavBar">
            <span>close</span>    
            <img src="{{ asset('images/icons/menu-close.svg') }}" class="inline" />
        </div>    
    </div>    
    {{-- mobile end --}}

    {{-- desktop --}}
    <div class="hidden md:flex items-center divide-x gap-10">
        <div class="flex items-end justify-between flex-wrap gap-10 text-lg">
            <a href="#">{{ __('web.navbar.cars') }}</a>
            <a href="#">{{ __('web.navbar.about') }}</a>
            <a href="#">{{ __('web.navbar.faq') }}</a>
            <a href="#">{{ __('web.navbar.blog') }}</a>
            <a href="#">{{ __('web.navbar.contact') }}</a>
        </div>
        <div class="pl-5 text-sm flex items-center gap-1">
            <span>{{ __("web.navbar." . App::currentLocale()) }}</span>
            <img class="inline" src='{{ URL::asset("/images/flags/".App::currentLocale().".svg") }}' />
        </div>
    </div>
    {{-- desktop end --}}
</nav>

{{-- mobile --}}
<div 
    x-cloak 
    class="md:hidden bg-white fixed top-10 left-0 h-screen w-screen z-40 overflow-hidden"
    x-show="showMobileNavBar"  
    x-transition:enter="transition ease-out duration-700"
    x-transition:enter-start="transform -translate-y-full opacity-[90%]"
    x-transition:enter-end="transform translate-y-0 opacity-full"

    x-transition:leave="transition ease-out duration-700"
    x-transition:leave-start="transform translate-y-0 opacity-full"
    x-transition:leave-end="transform -translate-y-full opacity-[90%]"
    >
    <div class="flex flex-col h-full justify-between">
        <div class="h-full">
            <div class="flex flex-col divide-y h-full">
                <div class="h-full p-9 flex flex-col items-center justify-between">
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
                            <button class="btn font-fredoka font-medium text-sm text-black-primary p-4 border border-[#E7ECF3] cursor-pointer"> View all cars </button>
                        </div>
                    </div>
                    <div class="text-center text-pink-red font-fredoka font-semibold text-[26px] p-5 h-full flex items-center justify-center">
                        Pay only 15% now
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between flex-wrap gap-7 text-xl font-fredoka font-medium">                        
                        <a href="#">{{ __('web.navbar.about') }}</a>
                        <a href="#">{{ __('web.navbar.faq') }}</a>
                        <a href="#">{{ __('web.navbar.blog') }}</a>
                        <a href="#">{{ __('web.navbar.contact') }}</a>
                    </div>
                </div>
                <div class="text-gray-tertiary text-2xl font-fredoka font-semibold text-center p-4">info@reykjavikauto.com</div>
            </div>            
        </div>

        <div class="bg-pink-red w-full h-5"></div>
        <div class="bg-black-primary w-full h-5"></div>
    </div>
</div>
{{-- mobile end --}}