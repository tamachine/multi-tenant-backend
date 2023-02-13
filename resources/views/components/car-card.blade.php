<div class="rounded-2lg flex flex-col git push bg-white">
    <div class="bg-[#f4f5f6] rounded-t-2lg">
        <div
            class="w-80 h-48 text-gray-600 group flex justify-center {{ $noImages ? 'items-end' : 'items-center' }} relative">
            @if ($hasHover)
                <img class="absolute
                    rounded-t-2lgl
                    transition ease-in-out opacity-100 group-hover:opacity-0 duration-300
                    "
                    src="{{ $mainImage }}">
                <img class="absolute
                    rounded-t-2lg w-80 max-h-48 object-cover object-center
                    transition ease-in-out opacity-0 group-hover:opacity-100 duration-300
                    "
                    src="{{ $secondaryImage }}">
            @else
                @if ($noImages)
                    <img class="rounded-t-2lg p-7" src="{{ $mainImage }}">
                @else
                    <img class="rounded-t-2lg w-80 max-h-48 object-cover object-center" src="{{ $mainImage }}">
                @endif
            @endif

            <div
                class="absolute bottom-5 right-5 bg-white px-2 py-1 rounded-md border border-[#E7ECF3] text-xs cursor-pointer hover:bg-black hover:text-white hover:border-pink-red group">
                <span>{{ __('cars.card-quick-look') }}</span> <img class="inline group-hover:hidden"
                    src="{{ asset('images/icons/eye.svg') }}" /> <img class="hidden group-hover:inline"
                    src="{{ asset('images/icons/eye-white.svg') }}" />
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-5 p-5 rounded-b-2lg justify-between h-full">
        <div class="font-fredoka-semibold text-[28px]">{!! $car->name !!}</div>
        <div class="flex flex-col gap-5">
            <div class="flex flex-col gap-y-1">
                <div class="text-[#B1B5C3]">{!! __('cars.card-features') !!}</div>
                <div class="grid grid-cols-[auto_1fr_auto] gap-y-3">
                    <div><img class="inline w-4" src="{{ App\Helpers\CarsFilters::getIconPath('seat') }}" />
                        {{ $car->adult_passengers }} <span>{!! __('cars.card-seats') !!}</span></div>
                    <div></div>
                    <div><img class="inline w-4" src="{{ App\Helpers\CarsFilters::getIconPath('transmission') }}" />
                        <span>{!! __('cars.card-transmission-' . $car->transmission) !!}</span>
                    </div>

                    <div><img class="inline w-4" src="{{ App\Helpers\CarsFilters::getIconPath('engine') }}" />
                        <span>{!! __('cars.card-engine-' . $car->engine) !!}</span>
                    </div>
                    <div></div>
                    <div><img class="inline w-4" src="{{ App\Helpers\CarsFilters::getIconPath('road') }}" />
                        <span>{!! $car->fRoadAllowed() ? __('cars.card-f-road-allowed') : __('cars.card-f-road-not-allowed') !!}</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <div>
                    <div class="font-sans-bold text-2xl">
                        {!! formatPrice($car->daily_price) !!}
                    </div>
                    <div class="text-[#B1B5C3]">{!! __('cars.card-perday') !!}</div>
                </div>
                <div>
                    <button class="btn btn-red text-base px-5 py-3"
                        wire:click="selectCar('{{ $car->hashid }}')"
                    >
                        {!! __('cars.card-button') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
