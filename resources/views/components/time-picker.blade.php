<div 
    class="md:w-1/2 text-center pt-16 md:pt-5"
    x-data="timePicker({ inputElementSelector: '#hour-{{ $range }}' })"
    >
    <div class="inline-block mb-4 text-black ">
        <span class="text-sm lg:text-base">
            @if ($range == 'start')
                {!! __('car-search-bar.start-time') !!}
            @else 
                {!! __('car-search-bar.end-time') !!}
            @endif
        </span>
        <img class="inline-block ml-3 mb-1 mr-1" src="{{ asset('images/icons/arrow-right-solid.svg') }}" alt="">
        <span 
            x-text="time"
            class="selected-time--{{ $range }} text-black text-lg lg:text-xl inline-block w-[50px] lg:w-[55px] text-right"
            >
            
        </span>
        <span 
            x-text="meridian"
            class="selected-time-type--{{ $range }} text-base inline-block w-[25px] ml-1"
            >
            
        </span>
    </div>
    <div class="range-slider range-slider--{{ $range }}">
        <div 
            id="range-bullet" 
            class="range-bullet range-bullet--{{ $range }} "
            x-ref="bulletValueElement"
        >
            <span 
                x-text="time" 
                id="bullet-time" 
                class="bullet-time bullet-time--{{ $range }}">
            </span>
            <small 
                x-text="meridian" 
                id="bullet-type" 
                class="bullet-type bullet-type--{{ $range }}">
            </small>
        </div>

        <input 
            x-ref="rangeInput"
            x-on:input="changeValue($event)"
            class="range-input range-input--{{ $range }}" 
            type="range" 
            value="24" 
            min="0" 
            max="47" 
            list="times"
        />
        
        <div class="range-times">
            <span class="">12 <small>AM</small></span>
            <span class="">6 <small>AM</small></span>
            <span class="">12 <small>PM</small></span>
            <span class="">6 <small>PM</small></span>
            <span class="">11 <small>PM</small></span>
        </div>
    </div>
</div>
