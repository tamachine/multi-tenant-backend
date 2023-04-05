<!-- Mobile -->
<div class="bg-pink-red-secondary text-center pt-16 pb-8 md:hidden">

    <div class="max-w-6xl mx-auto px-10 pb-5 md:pb-0 text-pink-red text-4xl md:text-8xl text-center md:text-left font-semibold leading-[50px] md:leading-[110px] font-fredoka-semibold">
        {{ __('contact.newsletter_title') }}
    </div>

    <div class="w-96 px-10 md:text-left text-center mx-auto md:mx-0">
        <span>{{ __('contact.newsletter_text') }}</span>
    </div>

    <!-- Subscribe -->
    <div class="mx-2">
        <x-input id="newsletter_email" type="email" class="mt-12 h-20 w-full block border-none" maxlength="255"
                 wire:model.defer="newsletter_email" autocomplete="email" placeholder="{{ __('contact.newsletter_placeholder') }}"
        />
    </div>

    <button class="h-12 w-32 mt-12 px-2 rounded-lg text-white font-sans-bold text-lg bg-pink-red hover:bg-black-ci disabled:bg-[#B1B5C3]"
            wire:click="send"
    >
        {{ __('contact.newsletter_subscribe') }}
    </button>
</div>


<!-- Desktop -->
<div class="bg-pink-red-secondary rounded-[60px] py-16 px-10 mx-4 text-center hidden md:block">
    <h2 class="max-w-2xl mx-auto">
        {{ __('contact.newsletter_title') }}
    </h2>

    <div class="max-w-xl mt-4 mx-auto text-black text-opacity-60">
        {{ __('contact.newsletter_text') }}
    </div>

    <!-- Subscribe -->
    <div class="max-w-[480px] h-20 px-4 mt-8 bg-white rounded-[27px] mx-auto flex justify-between content-center">
        <x-input id="newsletter_email" type="email" class="w-60 h-12 mt-4 block border-none" maxlength="255"
                 wire:model.defer="newsletter_email" autocomplete="email" placeholder="{{ __('contact.newsletter_placeholder') }}"
        />

        <button class="w-36 h-12 mt-4 px-2 rounded-lg text-white font-sans-bold text-lg bg-pink-red hover:bg-black-ci disabled:bg-[#B1B5C3]"
                wire:click="send"
        >
            {{ __('contact.newsletter_subscribe') }}
        </button>
    </div>
</div>

