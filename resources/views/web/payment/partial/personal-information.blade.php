<h3 class="hidden lg:block text-left text-yellow-ci">
    {!! __('payment.personal-information') !!}
</h3>

<h3 class="block lg:hidden text-center font-fredoka-semibold text-yellow-ci text-2xl">
    {!! __('payment.personal-information') !!}
</h3>

<div class="px-6 lg:px-0">
    <div class="lg:mt-2 lg:flex lg:justify-between">
        <x-payment-input field="first_name" type="text" placeholder="{{ __('payment.first-name') }}" />
        <x-payment-input field="last_name" type="text" placeholder="{{ __('payment.last-name') }}" />
    </div>

    <div class="lg:mt-2 lg:flex lg:justify-between">
        <x-payment-input field="email" type="email" placeholder="{{ __('payment.email') }}" />
        <x-payment-input field="email_confirmation" type="email" placeholder="{{ __('payment.email-confirmation') }}" />
    </div>

    <div class="lg:mt-2">
        <x-payment-input field="telephone" type="text" placeholder="{{ __('payment.telephone') }}" />
    </div>

    <div class="lg:mt-2 lg:flex lg:justify-between">
        <x-payment-input field="address" type="text" placeholder="{{ __('payment.your-address') }}" />
        <x-payment-input field="postal_code" type="text" placeholder="{{ __('payment.postal-code') }}" />
    </div>

    <div class="lg:mt-2 lg:flex lg:justify-between">
        <x-payment-input field="city" type="text" placeholder="{{ __('payment.city') }}" />
        <x-payment-input field="country" type="text" placeholder="{{ __('payment.country') }}" />
    </div>
</div>
