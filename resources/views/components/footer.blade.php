<footer class="pt-36">
    <div class="max-w-6xl mx-auto px-10 pb-5 md:pb-0 text-pink-red text-5xl md:text-8xl text-center md:text-left font-semibold leading-[50px] md:leading-[110px] font-fredokaOne">
        {!! __('web.footer.title') !!}
    </div>
    <div 
        before="" 
        class="relative before:content-[attr(before)] pt-28 md:pt-0 before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:z-0 before:bg-footer-image-pattern w-fill-screen">
            <img class="w-full h-[587px] md:h-auto object-cover" src="{{ $footerImagePath }}" />
            <div class="absolute md:top-[5%] top-0 left-0 right-0 bottom-0 z-10 text-lg">
                <div class="max-w-6xl mx-auto p-3">
                    <div class="w-96 px-10 md:text-left text-center mx-auto md:mx-0">
                        <span>{!! __('web.footer.text') !!}</span>
                        <div class="flex gap-4 pt-7 md:pt-3 justify-center md:justify-start">
                            <x-social />
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="bg-[#070000] w-fill-screen">
        <div class="max-w-6xl mx-auto md:p-3 px-1">
            
            <div class="bg-[#1C1C1C] flex flex-col gap-5 md:gap-0 md:flex-row flex-between items-center text-[#8c8c8c] rounded-xl px-3 md:px-9 py-7">
                <div class="flex-1 flex flex-col w-full">
                    <div class="font-fredoka text-2xl text-white">{!! __('web.footer.newsletter-title') !!}</div>
                    <div>{!! __('web.footer.newsletter-text') !!}</div>
                </div>
                <div class="flex-1 flex w-full md:justify-end">
                    <div class="relative w-full">
                        <form>
                            <input class="md:absolute right-0 my-auto top-0 bottom-0 rounded-xl border border-[#8c8c8c] py-4 md:py-7 px-7 bg-transparent w-full placeholder:text-base focus:border-[#8c8c8c] focus:ring-0" type="text" placeholder="{!! __('web.footer.newsletter-input-placeholder') !!}" />
                            <div   class="absolute right-3 my-auto top-0 bottom-0 flex justify-center items-center">
                                <button type="submit" class="btn btn-red px-7 md:px-6 py-3 md:py-2 text-sm font-medium rounded-md">{!! __('web.footer.newsletter-form-submit') !!}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="
                grid grid-cols-2 gap-10 md:gap-0 md:flex md:justify-between 
                w-full 
                font-medium text-[#E7ECF3] text-sm md:text-base 
                px-3 md:px-14 py-12"
                >
                @for ($i = 1; $i <= 4; $i++)
                <div>
                    <div class="font-fredoka font-semibold text-xl text-white pb-6">{!! __('web.footer.col-'.$i.'-links-title') !!}</div>
                    <ul class="flex flex-col gap-4">
                    @for ($x = 1; $x <= 5; $x++)
                        <li><a href="javascript:void(0)">{!! __('web.footer.col-'.$i.'-link-'.$x) !!}</a></li>
                    @endfor
                    </ul>                    
                </div>
                @endfor                
            </div>

            <div class="
                grid grid-cols-[auto_1fr] md:grid-cols-[1fr_auto_1fr] justify-center items-center gap-y-10 md:gap-0
                px-3 md:px-[14px]"
                >
                <div class="flex flex-col">
                    <div class="font-fredokaOne text-3xl text-pink-red">{{ __('web.general.brand') }}</div>
                    <div class="text-sm text-[#8c8c8c] hidden md:block">{!! __('web.footer.copyright') !!}</div>
                </div>
                <div class="flex gap-4 justify-end md:justify-center">
                    <x-social color="white"/>
                </div>
                <div class="ml-auto col-span-2 md:col-auto text-center md:text-right w-full">
                    <img class="inline" src="{{ asset('images/icons/cards/masterCard.png') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/maestro.png') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/visa.png') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/americanExpress.png') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/discover.png') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/unionPay.png') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/jcb.png') }}" />    
                                    
                    <div class="text-sm text-[#8c8c8c] md:hidden pt-4 md:pt-0">{!! __('web.footer.copyright') !!}</div>
                </div>                
            </div>
        </div>
    </div>
</footer>