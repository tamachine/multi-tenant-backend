<div>
    <div class="flex justify-between">
        <div class="w-full flex flex-col gap-3 max-w-[600px]">
            @include('web.payment.partial.personal-information')

            @include('web.payment.partial.payment-details')
        </div>

        <div class="md-max:hidden">
            @include('web.summary.index', ['buttonText' => __('summary.reserve-now')])
        </div>
    </div>
</div>
