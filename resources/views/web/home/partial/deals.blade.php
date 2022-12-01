<div class="pt-40 grid grid-cols-1 md:grid-cols-2 items-center gap-7 ">
    <div class="hidden md:inline-block rounded-2xl">
        <img class="object-cover" src="{{ asset('images/home/deals.png') }}" />
    </div>
    <div class="grid grid-cols-1 divide-y gap-5">
        <h2>{{ __('web.deals.title') }}</h2>
        <div class="flex flex-col gap-8 pt-10">
            <x-deal title="{!! __('web.deals.deal-title-1') !!}" text="{!! __('web.deals.deal-text-1') !!}" icon-path="{{ asset('images/icons/pound-red.svg') }}"/>
            <x-deal title="{!! __('web.deals.deal-title-2') !!}" text="{!! __('web.deals.deal-text-2') !!}" icon-path="{{ asset('images/icons/custom-service-red.svg') }}"/>
            <x-deal title="{!! __('web.deals.deal-title-3') !!}" text="{!! __('web.deals.deal-text-3') !!}" icon-path="{{ asset('images/icons/cancellation-red.svg') }}"/>
            <x-deal title="{!! __('web.deals.deal-title-4') !!}" text="{!! __('web.deals.deal-text-4') !!}" icon-path="{{ asset('images/icons/security-red.svg') }}"/>
            <x-deal title="{!! __('web.deals.deal-title-5') !!}" text="{!! __('web.deals.deal-text-5') !!}" icon-path="{{ asset('images/icons/user-red.svg') }}"/>            
        </div>
    </div>
</div>