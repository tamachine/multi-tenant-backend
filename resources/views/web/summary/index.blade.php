<div class="rounded-xl bg-white border p-8">
    <strong>{{$car->name}}</strong>

    <img class="mt-4 mx-auto rounded-t-2lg w-80 max-h-48 object-cover object-center" src="{{ $mainImage }}">

    <div class="mt-8 flex justify-between">
        <div>
            <div class="text-gray-600">
                {!! __('summary.pickup') !!}
            </div>
            <div class="text-black">
                {{bookingPickupDate()}}
            </div>
        </div>

        <div>
            <div class="text-gray-600">
                {!! __('summary.return') !!}
            </div>
            <div class="text-black">
                {{bookingDropoffDate()}}
            </div>
        </div>
    </div>

    <div class="mt-8">
        @if ($pickupLocation == $dropoffLocation)
            <div class="text-gray-600">
                {!! __('summary.pickup-return-location') !!}
            </div>
            <div class="text-black">
                {{$pickupLocation}}
            </div>
        @else
            <div class="text-gray-600">
                {!! __('summary.pickup-location') !!}
            </div>
            <div class="text-black">
                {{$pickupLocation}}
            </div>
            <div class="text-gray-600">
                {!! __('summary.return-location') !!}
            </div>
            <div class="text-black">
                {{$dropoffLocation}}
            </div>
        @endif
    </div>

    <hr class="my-4">

    @if (count($insurances))
        <div class="text-xl">
            {!! __('summary.insurances') !!}
        </div>

        @foreach($insurances as $insurance)
            <div class="mt-2 flex justify-between">
                <div>
                    {{$insurance['name']}}
                </div>

                <div>
                    {{formatPrice($insurance['price'])}}
                </div>
            </div>
        @endforeach
    @endif

    <hr class="my-4">

    <div class="text-xl">
        {!! __('summary.extras') !!}
    </div>

    @foreach($includedExtras as $includedExtra)
        <div class="mt-2 flex justify-between">
            <div>
                {{$includedExtra['name']}}
            </div>

            <div>
                {!! __('summary.free') !!}
            </div>
        </div>
    @endforeach

    @foreach($chosenExtras as $chosenExtra)
        <div class="mt-2 flex justify-between">
            <div>
                {{$chosenExtra['name']}}
            </div>

            <div>
                {{formatPrice($chosenExtra['price'])}}
            </div>
        </div>
    @endforeach

    <hr class="my-4">

    <div class="mt-2 flex justify-between">
        <div class="text-xl">
            {!! __('summary.total') !!}
        </div>

        <div class="text-xl">
            {{formatPrice($totalPrice)}}
        </div>
    </div>

    <div class="mt-2 flex justify-between">
        <div class="text-xl">
            {!! __('summary.pay-now-only') !!} {{$percentage}} %
        </div>

        <div class="text-xl">
            {{formatPrice($payNow)}}
        </div>
    </div>

    <div class="mt-8">
        {!! __('summary.isk-transactions') !!}
    </div>

    <div class="mt-2">
        <button class="w-full rounded-lg text-white font-sans-medium py-[6px] text-lg bg-yellow-ci px-4"
            wire:click="continue"
        >
            {!! $buttonText !!}
        </button>
    </div>
</div>
