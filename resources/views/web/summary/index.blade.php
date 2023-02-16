<div class="max-w-md rounded-xl bg-white border p-8">
    <div class="font-sans-bold text-2xl">
        {{$car->name}}
    </div>

    <img class="mt-8 mx-auto rounded-t-2lg w-80 max-h-48 object-cover object-center" src="{{ $mainImage }}">

    <div class="mt-8 flex justify-between">
        <div>
            <div class="font-sans-medium font-medium text-base text-[#A5A5A5]">
                {!! __('summary.pickup') !!}
            </div>
            <div class="font-sans-bold font-bold text-xl text-black-ci">
                {{bookingPickupDate()}}
            </div>
        </div>

        <div>
            <div class="font-sans-medium font-medium text-base text-[#A5A5A5]">
                {!! __('summary.return') !!}
            </div>
            <div class="font-sans-bold font-bold text-xl text-black-ci">
                {{bookingDropoffDate()}}
            </div>
        </div>
    </div>

    <div class="mt-8">
        @if ($pickupLocation == $dropoffLocation)
        <div class="font-sans-medium font-medium text-base text-[#A5A5A5]">
                {!! __('summary.pickup-return-location') !!}
            </div>
            <div class="font-sans-bold font-bold text-xl text-black-ci">
                {{$pickupLocation}}
            </div>
        @else
        <div class="font-sans-medium font-medium text-base text-[#A5A5A5]">
                {!! __('summary.pickup-location') !!}
            </div>
            <div class="font-sans-bold font-bold text-xl text-black-ci">
                {{$pickupLocation}}
            </div>
            <div class="font-sans-medium font-medium text-base text-[#A5A5A5]">
                {!! __('summary.return-location') !!}
            </div>
            <div class="font-sans-bold font-bold text-xl text-black-ci">
                {{$dropoffLocation}}
            </div>
        @endif
    </div>

    <hr class="my-4">

    @if (count($insurances))
        <div class="font-sans-bold font-bold text-[26px] text-black-ci">
            {!! __('summary.insurances') !!}
        </div>

        @foreach($insurances as $insurance)
            <div class="mt-2 flex justify-between">
                <div class="font-sans-bold font-bold text-xl text-black-ci">
                    {{$insurance['name']}}
                </div>

                <div class="font-sans-medium font-medium text-xl {{$insurance['price'] > 0 ? 'text-black-ci' : 'text-yellow-ci'}}">
                    {{formatPrice($insurance['price'])}}
                </div>
            </div>
        @endforeach
    @endif

    <hr class="my-4">

    <div class="font-sans-bold font-bold text-[26px] text-black-ci">
        {!! __('summary.extras') !!}
    </div>

    @foreach($includedExtras as $includedExtra)
        <div class="mt-2 flex justify-between">
            <div class="font-sans-bold font-bold text-xl text-black-ci">
                {{$includedExtra['name']}}
            </div>

            <div class="font-sans-medium font-medium text-xl text-yellow-ci">
                {!! __('summary.free') !!}
            </div>
        </div>
    @endforeach

    @foreach($chosenExtras as $chosenExtra)
        <div class="mt-2 flex justify-between">
            <div class="font-sans-bold font-bold text-xl text-black-ci">
                {{$chosenExtra['name']}}
            </div>

            <div class="font-sans-medium font-medium text-xl text-black-ci">
                {{formatPrice($chosenExtra['price'])}}
            </div>
        </div>
    @endforeach

    <hr class="my-4">

    <div class="mt-2 flex justify-between">
        <div class="font-sans-bold font-bold text-[28px] text-black-ci">
            {!! __('summary.total') !!}
        </div>

        <div class="font-sans-bold font-bold text-[28px] text-black-ci">
            {{formatPrice($totalPrice)}}
        </div>
    </div>

    <div class="mt-2 flex justify-between bg-[#d9d9d94d] rounded-md p-4 items-center">
        <div class="font-sans-medium font-medium text-xl text-yellow-ci">
            {!! __('summary.pay-now-only') !!} {{$percentage}} %
        </div>

        <div class="font-sans-bold font-bold text-[26px] text-yellow-ci">
            {{formatPrice($payNow)}}
        </div>
    </div>

    <div class="mt-8 ont-sans text-center">
        {!! __('summary.isk-transactions') !!} <strong>ISK</strong>
    </div>

    <div class="mt-2">
        <button class="w-full rounded-lg text-white font-sans-bold py-4 text-lg bg-yellow-ci hover:bg-black-ci disabled:bg-[#B1B5C3]"
            wire:click="continue"
        >
            {!! $buttonText !!}
        </button>
    </div>
</div>
