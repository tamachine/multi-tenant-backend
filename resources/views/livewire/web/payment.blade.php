<div class="relative">
    <div class="xl:flex xl:justify-between">
        <div class="w-full flex flex-col gap-3 max-w-[600px] mx-auto">
            @include('web.payment.partial.personal-information')

            @include('web.payment.partial.additional')
        </div>

        <div class="hidden xl:block">
            @include('web.summary.index', ['buttonText' => __('summary.reserve-now')])
        </div>
    </div>    

    @if($generateValitorForm)                                
        @include('web.payment.partial.payment-processing')
    
        <x-valitor-form :booking="$booking" />
    @endif    
</div>
