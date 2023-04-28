<div class="relative">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20">
        <x-wire-spinner /> 
    </div>

    @if($showModal)
        <x-modal :title="__('newsletter.email_sent-title')" :text="__('newsletter.email_sent-text')"/>
    @endif
    
    <div class="bg-pink-red-secondary md:rounded-[60px] -mx-3 md:mx-0 py-14 px-4 text-center">
        <h2 class="max-w-2xl mx-auto text-[32px] md:text-5xl leading-10 md:leading-[60px] px-7">
            {{ __('newsletter.title') }}
        </h2>

        <div class="max-w-xl mt-4 md:mt-3 mx-auto font-sans text-base  px-7">
            {{ __('newsletter.text') }}
        </div>

        <!-- Subscribe -->
        <div class="md:max-w-[480px] mx-auto h-20 mt-8 bg-white rounded-xl md:rounded-3xl flex justify-between content-center">
            <x-input id="newsletter_email" type="email" class="w-full h-full border-none focus:ring-0 focus:bg-white mx-4" maxlength="255"
                    wire:model.defer="newsletter_email" autocomplete="email" placeholder="{{ __('newsletter.placeholder') }}"
            />

            <button class="
                    hidden md:block 
                    w-36 h-12 mt-4 px-4 mx-4
                    rounded-lg 
                    text-white font-sans-bold text-xl 
                    bg-pink-red hover:bg-black disabled:bg-[#B1B5C3]"
                    wire:click="send"
            >
                {{ __('newsletter.subscribe') }}
            </button>
        </div>

        <button class="
                md:hidden block mx-auto
                mt-12             
                w-36 h-12
                rounded-lg 
                text-white font-sans-bold text-xl
                bg-pink-red hover:bg-black disabled:bg-[#B1B5C3]"
                wire:click="send"
        >
            {{ __('newsletter.subscribe') }}
        </button>
    </div>
    
</div>
