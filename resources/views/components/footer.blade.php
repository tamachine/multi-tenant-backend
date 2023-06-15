<footer class="max-w-6xl mx-auto pt-28 md:pt-36">
    <div class="px-3 sm:px-8 md:px-10 pb-5 md:pb-0 text-pink-red text-5xl md:text-8xl text-center md:text-left font-semibold leading-[50px] md:leading-[110px] font-fredoka-semibold">
        {!! __('footer.title') !!}
    </div>
    <div
        before=""
        class="relative before:content-[attr(before)] pt-28 md:pt-0 before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:z-0 md:before:bg-footer-image-pattern before:bg-footer-image-pattern-mobile w-fill-screen">
           
            <x-image :path="$footerImagePath" class="w-full h-[587px] md:h-auto object-cover" />
            
            <div class="absolute md:top-[5%] top-0 left-0 right-0 bottom-0 z-10 text-lg">
                <div class="max-w-6xl mx-auto px-3 sm:px-8 md:px-14">
                    <div class="max-w-xs text-center md:text-left mx-auto md:mx-0">
                        <span>{!! __('footer.text') !!}</span>
                        <div class="flex gap-4 pt-7 md:pt-3 justify-center md:justify-start">
                            <x-social color="red"/>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    <div class="bg-[#070000] w-fill-screen">
        <div class="max-w-6xl mx-auto px-1 md:py-3">

            <div class="bg-[#1C1C1C] flex flex-col gap-5 md:gap-0 md:flex-row flex-between items-center text-[#8c8c8c] rounded-xl px-3 sm:px-8 md:px-9 py-7">
                <div class="flex-1 flex flex-col w-full">
                    <div class="font-fredoka-medium font-medium text-2xl text-white">{!! __('footer.newsletter-title') !!}</div>
                    <div class="md:text-base text-sm">{!! __('footer.newsletter-text') !!}</div>
                </div>
                <div class="flex-1 flex w-full md:justify-end">
                    <div class="relative w-full">
                        <form>
                            <input class="md:absolute right-0 my-auto top-0 bottom-0 rounded-xl border border-[#8c8c8c] py-4 md:py-7 px-7 bg-transparent w-full placeholder:text-base focus:border-[#8c8c8c] focus:ring-0" type="text" placeholder="{!! __('footer.newsletter-input-placeholder') !!}" />
                            <div   class="absolute right-3 my-auto top-0 bottom-0 flex justify-center items-center">
                                <button type="submit" class="btn btn-red px-7 md:px-6 py-3 md:py-2 text-sm font-sans-medium font-medium rounded-md">{!! __('footer.newsletter-form-submit') !!}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="
                grid grid-cols-2 gap-10 md:gap-0 md:flex md:justify-between
                w-full
                font-medium text-gray-secondary text-sm md:text-base
                px-3 sm:px-8 md:px-14 py-12"
                >
                @for ($i = 1; $i <= 4; $i++)
                <div>
                    <div class="font-fredoka-semibold font-semibold text-xl text-white pb-6">{!! __('footer.col-'.$i.'-links-title') !!}</div>
                    <ul class="font-sans-medium font-medium flex flex-col gap-4">
                    @for ($x = 1; $x <= 5; $x++)
                        <li><a href="javascript:void(0)">{!! __('footer.col-'.$i.'-link-'.$x) !!}</a></li>
                    @endfor
                    </ul>
                </div>
                @endfor
            </div>

            <div class="
                grid grid-cols-[auto_1fr] md:grid-cols-[1fr_auto_1fr] justify-center items-center gap-y-10 md:gap-0
                px-3 sm:px-8 md:px-[14px] pb-10 md:pb-7"
                >
                <div class="flex flex-col">
                    <div class="font-fredokaOne text-3xl text-pink-red">{{ __('general.brand') }}</div>
                    <div class="text-sm text-[#8c8c8c] hidden md:block">{!! __('footer.copyright') !!}</div>
                </div>
                <div class="flex gap-4 justify-end md:justify-center">
                    <x-social color="white"/>
                </div>
                <div class="ml-auto col-span-2 md:col-auto text-center md:text-right w-full">
                    <img class="inline" src="{{ asset('images/icons/cards/master-card.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/maestro.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/visa.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/american-express.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/discover.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/union-pay.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/jcb.svg') }}" />

                    <div class="text-sm text-[#8c8c8c] md:hidden pt-4 md:pt-0">{!! __('footer.copyright') !!}</div>
                </div>
            </div>
        </div>
    </div>
</footer>
