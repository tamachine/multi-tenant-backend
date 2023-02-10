<div class="rounded-xl bg-white border p-8">
    <strong>{{$car->name}}</strong>

    <img class="mt-4 mx-auto rounded-t-2lg w-80 max-h-48 object-cover object-center" src="{{ $mainImage }}">

    <div class="mt-8 flex justify-between">
        <div>
            <div class="text-gray-600">
                {!! __('extras.pickup') !!}
            </div>
            <div class="text-black">
                {{bookingPickupDate()}}
            </div>
        </div>

        <div>
            <div class="text-gray-600">
                {!! __('extras.return') !!}
            </div>
            <div class="text-black">
                {{bookingDropoffDate()}}
            </div>
        </div>
    </div>

    <div class="mt-8">
        @if ($pickupLocation == $dropoffLocation)
            <div class="text-gray-600">
                {!! __('extras.pickup-return-location') !!}
            </div>
            <div class="text-black">
                {{$pickupLocation}}
            </div>
        @else
            <div class="text-gray-600">
                {!! __('extras.pickup-location') !!}
            </div>
            <div class="text-black">
                {{$pickupLocation}}
            </div>
            <div class="text-gray-600">
                {!! __('extras.return-location') !!}
            </div>
            <div class="text-black">
                {{$dropoffLocation}}
            </div>
        @endif
    </div>

    <hr class="my-4">

    @if (count($insurances))
        <div class="text-xl">
            {!! __('extras.insurances') !!}
        </div>

        @foreach($insurances as $insurance)
            <div class="mt-2 flex justify-between">
                <div>
                    {{$insurance['name']}}
                </div>

                <div>
                    {{$insurance['price']}} ISK
                </div>
            </div>
        @endforeach
    @endif

    <hr class="my-4">

    <div class="text-xl">
        {!! __('extras.extras') !!}
    </div>

    @foreach($includedExtras as $includedExtra)
        <div class="mt-2 flex justify-between">
            <div>
                {{$includedExtra['name']}}
            </div>

            <div>
                {!! __('extras.free') !!}
            </div>
        </div>
    @endforeach

    @foreach($chosenExtras as $chosenExtra)
        <div class="mt-2 flex justify-between">
            <div>
                {{$chosenExtra['name']}}
            </div>

            <div>
                {{$chosenExtra['price']}} ISK
            </div>
        </div>
    @endforeach

    <hr class="my-4">

    <div class="mt-2 flex justify-between">
        <div class="text-xl">
            {!! __('extras.total') !!}
        </div>

        <div class="text-xl">
            {{$total}} ISK
        </div>
    </div>

    <div class="mt-2 flex justify-between">
        <div class="text-xl">
            {!! __('extras.pay-now-only') !!} {{$percentage}} %
        </div>

        <div class="text-xl">
            {{$payNow}} ISK
        </div>
    </div>

    <div class="mt-8">
        {!! __('extras.isk-transactions') !!}
    </div>

    <div class="mt-2">
        <button class="w-full rounded-lg text-white font-sans-medium py-[6px] text-lg bg-pink-red px-4">
            {!! __('extras.continue') !!}
        </button>
    </div>
</div>
