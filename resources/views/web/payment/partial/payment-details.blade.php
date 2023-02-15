<div class="mt-16" wire:ignore>
    <h3 class="text-left text-yellow-ci">
        {!! __('payment.payment-details') !!}
    </h3>

    <div class="mt-8 flex justify-between items-center">
        <div class="w-[280px]">
            <img src="{{ asset('images/sample-card.png') }}" class="w-[280px]" />
        </div>

        <div class="w-[280px]">
            <div>
                <x-input id="card_number" type="text" class="w-[280px] h-12" placeholder="{{ __('payment.card-number') }}" />
            </div>

            <div class="mt-6">
                <x-input id="card_name" type="text" class="w-[280px] h-12" placeholder="{{ __('payment.card-number') }}" />
            </div>

            <div class="mt-6 flex justify-between">
                <x-input id="card_month" type="text" class="w-[85px] h-12" placeholder="{{ __('payment.card-month') }}" />
                <x-input id="card_year" type="text" class="w-[85px] h-12" placeholder="{{ __('payment.card-year') }}" />
                <x-input id="card_csv" type="text" class="w-[85px] h-12" placeholder="{{ __('payment.card-csv') }}" />
            </div>
        </div>
    </div>
</div>
