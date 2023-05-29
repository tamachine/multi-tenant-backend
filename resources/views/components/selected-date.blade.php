<div
    {!! $attributes->merge(['class' => 'search-input-set']) !!}
>
    <div class="search-input-label">
        <label for="{{ $type }}-date">{!! __('car-search-bar.' . $type . '-day') !!}</label>
    </div>
    <div class="hidden selected-date">
        <div class="flex flex-row items-stretch justify-center font-sans-medium gap-1">
            <span id="" class="{{ $type }}-day text-[30px] leading-[0.8em]"></span>
            <div class="flex flex-col justify-between">
                <span id="" class="{{ $type }}-dayweek text-[12px] leading-none capitalize"></span>
                <span id="" class="{{ $type }}-month text-[12px] leading-none"></span>
            </div>
        </div>
    </div>
    <input type="text" class="{{ $type }}-date search-input" placeholder="{!! __('car-search-bar.' . $type . '-day-placeholder') !!}" readonly="readonly"/>
</div>
