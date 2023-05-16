@php 
    $ranges = ['pickup', 'return']; 
@endphp

<div :class="showTime ? '' : 'hidden'" class="flex flex-col h-full justify-between md:inline-block w-full md:h-auto">
    <div id="date-resume" :class="showTime ? '' : 'hidden'" x-on:click="backShowDate()" class=" md:hidden">
        <h3 class="text-gray-light">{!! __('car-search-bar.mobile-first-input-placeholder') !!}</h3>
        <div class="border-[1px] border-gray-secondary rounded w-[90%] mx-auto">
            @foreach ($ranges as $range)
                <div id="resume-{{ $range }}" class="text-black">
                    <span>
                        Pick-up
                    </span>
                    <span>
                        18
                    </span>
                    <div>
                        <span>Mon</span>
                        <span>Nov</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="time-picker" class="px-[3%] lg:px-4 md:mt-4">
        <h3 class="text-black text-lg md:hidden">{!! __('car-search-bar.mobile-time-title') !!}</h3>
        <div class="container md:flex md:gap-[5%] relative md:border-t-[1px] md:border-gray-secondary">

            @foreach ($ranges as $range)
                <div class="md:w-1/2 text-center pt-16 md:pt-5">
                    <div class="inline-block mb-4 text-black ">
                        <span class="text-sm lg:text-base">
                            @if ($range == 'pickup')
                                {!! __('car-search-bar.pick-up-time') !!}
                            @else 
                                {!! __('car-search-bar.return-time') !!}
                            @endif
                        </span>
                        <img class="inline-block ml-3 mb-1 mr-1" src="{{ asset('images/icons/arrow-right-solid.svg') }}" alt="">
                        <span class="selected-time--{{ $range }} text-black text-lg lg:text-xl inline-block w-[50px] lg:w-[55px] text-right">12:00</span>
                        <span class="selected-time-type--{{ $range }} text-base inline-block w-[25px] ml-1">AM</span>
                    </div>
                    <div class="range-slider range-slider--{{ $range }}">
                        <div id="range-bullet" class="range-bullet range-bullet--{{ $range }} ">
                            <span id="bullet-time" class="bullet-time bullet-time--{{ $range }}">12:00</span>
                            <small id="bullet-type" class="bullet-type bullet-type--{{ $range }}">PM</small>
                        </div>
                        <input class="range-input range-input--{{ $range }}" type="range" value="24" min="0" max="47" list="times">
                        <div class="range-times">
                            <span class="">12 <small>AM</small></span>
                            <span class="">6 <small>AM</small></span>
                            <span class="">12 <small>PM</small></span>
                            <span class="">6 <small>PM</small></span>
                            <span class="">11 <small>PM</small></span>
                        </div>
                    </div>
                </div>
            @endforeach

            <datalist id="times">
                @for($i = 0; $i <= 47; $i++)
                    @php
                        $hour = floor($i / 2);
                        $minute = ($i % 2 == 0) ? "00" : "30";
                        $meridian = ($hour >= 12) ? "PM" : "AM";
                        if ($hour == 0) {
                            $hour = 12;
                        } else if ($hour > 12) {
                            $hour -= 12;
                        }
                        $time = $hour . ":" . $minute;
                    @endphp
                    <option value="{{ $i }}" time="{{ $time }}" type="{{ $meridian }}">
                        {{ $hour }}:{{ $minute }} <span>{{ $meridian }}</span>
                    </option>
                @endfor
            </datalist>
        
        </div>
    </div>
    <div class="md:hidden w-full text-center">
        <button x-on:click="continueShowLocation()" id="continue-time__button" class="btn btn-red px-16 py-3">{!! __('car-search-bar.mobile-continue-button') !!}</button>
    </div>
</div>

@push('scripts')
    <script>
        const rangeSliderPickup = document.querySelector(".range-input--pickup");
        const rangeSliderReturn = document.querySelector(".range-input--return");
        
        rangeSliderPickup.addEventListener("input", showSliderValue, false);
        rangeSliderPickup.range = 'pickup';
        rangeSliderReturn.addEventListener("input", showSliderValue, false);
        rangeSliderReturn.range = 'return';

        function showSliderValue(event) {
            const range = event.currentTarget.range;
            const rangeBullet = document.querySelector(".range-bullet--" + range)
            const timeBullet = document.querySelector(".bullet-time--" + range);
            const typeBullet = document.querySelector(".bullet-type--" + range);
            let valueRange = event.currentTarget.value;
            let rangeSelected = document.querySelector('option[value="'+ valueRange +'"]');
            let timeSelected = rangeSelected.getAttribute('time');
            let typeSelected = rangeSelected.getAttribute('type');
            
            
            /********************
                SHOW TIME VALUE
            ********************/
            timeBullet.innerHTML = timeSelected;
            typeBullet.innerHTML = typeSelected;
            // Asign time value to input
            document.getElementById('hour-' + range).value = timeSelected + ' ' + typeSelected;
            // Asign time value to text above
            document.querySelector('.selected-time--' + range).innerHTML = timeSelected;
            document.querySelector('.selected-time-type--' + range).innerHTML = typeSelected;
            

            
            /********************
                POSITION BULLET
            ********************/
            let bulletPosition = (event.currentTarget.value /event.currentTarget.max);
            const widthInputRange = event.currentTarget.offsetWidth;
            let leftPosition = (bulletPosition * (widthInputRange - 80));/* El 80 son los pixels que mide el bolo rosa. Su medida está en .range-input::-webkit-slider-thumb*/
            rangeBullet.style.left = leftPosition + "px";
            rangeBullet.style.transform = "none";


            /********************
                'ACTIVE' CLASS
            ********************/
            const inputFilled = document.getElementById('hour-' + range)
            const setFilled = inputFilled.parentElement
            setFilled.classList.add('active');

            let pickupHour = document.getElementById('hour-pickup') 
            let returnHour = document.getElementById('hour-return') 
        
            if (pickupHour.value !== '' && returnHour.value !== '') {
                setFilled.parentElement.classList.add('active');
            }

        }

    </script>
@endpush