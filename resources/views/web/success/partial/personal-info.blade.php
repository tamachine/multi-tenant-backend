<div class="w-11/12 xl:w-1/2 max-w-[600px] mx-auto mt-8 xl:mt-0 rounded-xl bg-white border border-gray-secondary px-5 py-12 md:px-11 md:py-14">
    <div>
        <div class="mb-4 font-sans-bold text-2xl">
            {!! __('payment.personal-info') !!}
        </div>

        <div class="flex border-b border-gray-secondary font-sans-medium text-base text-black-ci">
            <div class="w-1/3 py-4 border-r border-gray-secondary">
                {!! __('payment.name') !!}
            </div>

            <div class="w-2/3 py-4 pl-9">
                {{$booking->name}}
            </div>
        </div>

        <div class="flex border-b border-gray-secondary font-sans-medium text-base text-black-ci">
            <div class="w-1/3 py-4 border-r border-gray-secondary">
                {!! __('payment.email') !!}
            </div>

            <div class="w-2/3 py-4 pl-9">
                {{$booking->email}}
            </div>
        </div>

        <div class="flex border-b border-gray-secondary font-sans-medium text-base text-black-ci">
            <div class="w-1/3 py-4 border-r border-gray-secondary">
                {!! __('payment.telephone') !!}
            </div>

            <div class="w-2/3 py-4 pl-9">
                {{$booking->telephone}}
            </div>
        </div>

        <div class="flex border-b border-gray-secondary font-sans-medium text-base text-black-ci">
            <div class="w-1/3 py-4 border-r border-gray-secondary">
                {!! __('payment.address') !!}
            </div>

            <div class="w-2/3 py-4 pl-9">
                {{$booking->address}}
            </div>
        </div>

        <div class="flex border-b border-gray-secondary font-sans-medium text-base text-black-ci">
            <div class="w-1/3 py-4 border-r border-gray-secondary">
                {!! __('payment.city') !!}
            </div>

            <div class="w-2/3 py-4 pl-9">
                {{$booking->city}}
            </div>
        </div>

        <div class="flex border-b border-gray-secondary font-sans-medium text-base text-black-ci">
            <div class="w-1/3 py-4 border-r border-gray-secondary">
                {!! __('payment.postal-code') !!}
            </div>

            <div class="w-2/3 py-4 pl-9">
                {{$booking->postal_code}}
            </div>
        </div>

        <div class="flex font-sans-medium text-base text-black-ci">
            <div class="w-1/3 py-4 border-r border-gray-secondary">
                {!! __('payment.country') !!}
            </div>

            <div class="w-2/3 py-4 pl-9">
                {{$booking->country}}
            </div>
        </div>
    </div>

    <hr class="hidden md:block border-gray-secondary my-16">

    <div class="mb-4 font-sans-bold text-2xl">
        {!! __('payment.payment-info') !!}
    </div>

    <div class="flex font-sans-medium text-base text-black-ci">
        Me niego a poner datos de tarjetas de crédito
    </div>
</div>
