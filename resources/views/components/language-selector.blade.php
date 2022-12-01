<div class="rounded-b-xl shadow-xl bg-white font-fredoka text-xl md:text-base">
    <div class="md:p-8 md:pb-4">
        <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-x-12">
            <div>Select language</div>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-x-7 gap-y-5">
                @foreach(config('languages') as $code => $language)
                    <div class="flex gap-2">
                        <img src="{{ asset('images/flags/'.$code.'.svg') }}" />
                        <a href="javascript:void(0)" class="hover:text-pink-red">{{ __('web.general.languages-'.$code) }}</a>
                    </div>
                @endforeach                
            </div>
            <div class="mt-12">Select currency</div>
            <div class="mt-12 grid md:grid-cols-4 grid-cols-2 gap-8">
                <div class="flex gap-2">
                    <img src="{{ asset('images/currencies/dollar-red.svg') }}" />
                    <a href="javascript:void(0)" class="hover:text-pink-red">USD</a>
                </div>
                <div class="flex gap-2">
                    <img src="{{ asset('images/currencies/euro-red.svg') }}" />
                    <a href="javascript:void(0)" class="hover:text-pink-red">EUR</a>
                </div>
                <div class="flex gap-2">
                    <img src="{{ asset('images/currencies/pound-red.svg') }}" />
                    <a href="javascript:void(0)" class="hover:text-pink-red">GBP</a>
                </div>
                <div class="flex gap-2">
                    <img src="{{ asset('images/currencies/kr-red.svg') }}" />
                    <a href="javascript:void(0)" class="hover:text-pink-red">ISK</a>
                </div>                
            </div>
            <div></div>
            <div class="mt-2 flex justify-center w-full text-xs font-medium">{{ __('web.general.languages-remember') }}</div>
        </div>
    </div>
</div>
