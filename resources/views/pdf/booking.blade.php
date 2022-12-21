@extends('layouts.pdf')

@section('content')
    <div class="page">
        {{-- Logo & Details --}}
        <div class="flex items-center">
            <div class="">
                <img src="{{asset('images/cars-iceland/logo.png')}}" class="w-40">
            </div>

            <div class="ml-4 leading-tight">
                <span class="text-xs font-bold">
                    Cars Iceland
                </span>
                <br>
                <span class="text-xs">
                    +354 497 1216 - info@carsiceland.com - www.carsiceland.com
                    <br>
                    Be Local Buy Local - Keflavik Airport (Iceland) - SSN: 680513-1630
                </span>
            </div>
        </div>

        <hr class="bg-black h-0.5 my-4">

        <div class="text-center text-xl font-bold">
            Thank you for booking with Cars Iceland
        </div>

        <div class="mt-8 text-lg font-bold">
            Booking Reference: {{$booking->order_id}}
        </div>

        {{-- Data table --}}
        <div class="mt-4">
            <table class="min-w-full divide-y divide-gray-200 text-xs">
                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Vehicle
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->car->name}}
                    </td>
                </tr>

                <tr class="border bg-gray-100">
                    <td class="w-1/3 font-semibold border-r p-1">
                        From
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->pickup_at->format('d-m-Y H:i')}}
                    </td>
                </tr>

                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        To
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->dropoff_at->format('d-m-Y H:i')}}
                    </td>
                </tr>

                <tr class="border bg-gray-100">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Pickup point details
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->pickupLocation->name}}
                        @if ($booking->pickup_input_info)
                            - {{$booking->pickup_input_info}}
                        @endif
                    </td>
                </tr>

                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Dropoff point details
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->dropoffLocation->name}}
                        @if ($booking->dropoff_input_info)
                            - {{$booking->dropoff_input_info}}
                        @endif
                    </td>
                </tr>

                <tr class="border bg-gray-100">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Name
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->first_name}} {{$booking->last_name}}
                    </td>
                </tr>

                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Email
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->email}}
                    </td>
                </tr>

                <tr class="border bg-gray-100">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Address
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->address}}
                    </td>
                </tr>

                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Zip / Postal Code
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->postal_code}}
                    </td>
                </tr>

                <tr class="border bg-gray-100">
                    <td class="w-1/3 font-semibold border-r p-1">
                        City
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->city}}
                    </td>
                </tr>

                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Country
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->country}}
                    </td>
                </tr>

                <tr class="border bg-gray-100">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Telephone
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->telephone}}
                    </td>
                </tr>

                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Number of passengers
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->number_passengers}}
                    </td>
                </tr>

                <tr class="border bg-gray-100">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Driver's name
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->driver_name}}
                    </td>
                </tr>

                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Driver's license number
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->driver_license_number}}
                    </td>
                </tr>

                <tr class="border bg-gray-50">
                    <td class="w-1/3 font-semibold border-r p-1">
                        Driver's date of birth
                    </td>

                    <td class="w-2/3 font-normal p-1">
                        {{$booking->driver_date_birth}}
                    </td>
                </tr>
            </table>
        </div>

        <div class="mt-8 text-xl font-bold">
            Payment
        </div>

        {{-- Payment table --}}
        <table class="mt-4 w-1/2 divide-y divide-gray-200 text-xs">
            <tr class="bg-white border">
                <td class="w-1/2 font-normal p-1">
                    Total price
                </td>

                <td class="w-1/2 font-bold text-right p-1">
                    {{ formatPrice($booking->total_price, "ISK") }}
                </td>
            </tr>

            <tr class="bg-white border">
                <td class="w-1/2 font-normal p-1">
                    Online payment
                </td>

                <td class="w-1/2 font-bold text-right p-1">
                    {{ formatPrice($booking->online_payment, "ISK") }}
                </td>
            </tr>

            <tr class="bg-white border">
                <td class="w-1/2 font-normal p-1">
                    Pay in Iceland
                </td>

                <td class="w-1/2 font-bold text-right p-1">
                    {{ formatPrice(($booking->total_price - $booking->online_payment), "ISK") }}
                </td>
            </tr>
        </table>

        <div class="mt-4 text-lg font-bold">
            Provided by
        </div>

        <div class="mt-2">
            @if ($booking->vendor->logo_url)
                <img src="{{$booking->vendor->logo_url}}" class="w-40">
            @else
                {{$booking->vendor->name}}
            @endif
        </div>

        <div class="mt-4 text-lg font-bold">
            Additional information
        </div>

        <div class="mt-2">
            <ul class="list-disc ml-4 text-xs">
                <li class="ml-4">ID or passport of the renter *</li>
                <li class="ml-4">Valid driving license of the driver (at least one year old) *</li>
                <li class="ml-4">Valid credit card</li>
            </ul>
        </div>

        <div class="mt-2 text-xs">
            (*) Applicable to all additional drivers.
        </div>
    </div>
@endsection
