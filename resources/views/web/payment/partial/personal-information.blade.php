<h3 class="text-left text-pink-red">
    {!! __('payment.personal-information') !!}
</h3>

<div class="mt-4 flex justify-between">
    <div>
        <x-input id="first_name" type="text" class="w-[280px] h-12" wire:model="first_name" placeholder="{{ __('payment.first-name') }}" autocomplete="first_name" />
        <x-input-error for="first_name" class="mt-2" />
    </div>

    <div>
        <x-input id="last_name" type="text" class="w-[280px] h-12" wire:model="last_name" placeholder="{{ __('payment.last-name') }}"  autocomplete="last_name" />
        <x-input-error for="last_name" class="mt-2" />
    </div>
</div>

<div class="mt-6 flex justify-between">
    <div>
        <x-input id="email" type="email" class="w-[280px] h-12" wire:model="email" placeholder="{{ __('payment.email') }}" autocomplete="email" />
        <x-input-error for="email" class="mt-2" />
    </div>

    <div>
        <x-input id="email_confirmation" type="email" class="w-[280px] h-12" wire:model="email_confirmation" placeholder="{{ __('payment.email-confirmation') }}"  autocomplete="email" />
    </div>
</div>

<div class="mt-6">
    <x-input id="telephone" type="text" class="w-[280px] h-12" wire:model="telephone" placeholder="{{ __('payment.telephone') }}" autocomplete="telephone" />
    <x-input-error for="telephone" class="mt-2" />
</div>

<div class="mt-4 flex justify-between">
    <div>
        <x-input id="address" type="text" class="w-[280px] h-12" wire:model="address" placeholder="{{ __('payment.address') }}" autocomplete="address" />
        <x-input-error for="address" class="mt-2" />
    </div>

    <div>
        <x-input id="postal_code" type="text" class="w-[280px] h-12" wire:model="postal_code" placeholder="{{ __('payment.postal-code') }}"  autocomplete="postal_code" />
        <x-input-error for="postal_code" class="mt-2" />
    </div>
</div>

<div class="mt-4 flex justify-between">
    <div>
        <x-input id="city" type="text" class="w-[280px] h-12" wire:model="city" placeholder="{{ __('payment.city') }}" autocomplete="city" />
        <x-input-error for="city" class="mt-2" />
    </div>

    <div>
        <x-input id="country" type="text" class="w-[280px] h-12" wire:model="country" placeholder="{{ __('payment.country') }}"  autocomplete="country" />
        <x-input-error for="country" class="mt-2" />
    </div>
</div>
