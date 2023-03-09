<div class="mt-16 bg-[#fdeef4] rounded-xl py-16 px-10 mx-4 text-center">
    <h2 class="max-w-2xl mx-auto">
        {{ __('contact.newsletter_title') }}
    </h2>

    <div class="max-w-xl mt-4 mx-auto">
        {{ __('contact.newsletter_text') }}
    </div>

    <!-- Subscribe -->
    <div class="max-w-[480px] h-20 px-4 mt-4 bg-white rounded-lg mx-auto flex justify-between content-center">
        <x-input id="newsletter_email" type="email" class="w-60 h-12 mt-4 block border-none" maxlength="255"
            wire:model.defer="newsletter_email" autocomplete="email" placeholder="{{ __('contact.newsletter_placeholder') }}"
        />

        <button class="h-12 mt-4 px-2 rounded-lg text-white font-sans-bold text-lg bg-pink-red hover:bg-black-ci disabled:bg-[#B1B5C3]"
            wire:click="send"
        >
            {{ __('contact.newsletter_subscribe') }}
        </button>
    </div>
</div>
