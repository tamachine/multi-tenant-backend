<x-admin.form-section submit="saveCar" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Vendor -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="vendor" value="{{ __('Vendor') }}" />
            {{$vendor}}
        </div>

        <!-- Name -->
        <div class="px-4 mt-4">
            <x-admin.label for="name" value="{{ __('Name') }}" />
            <x-admin.input id="name" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="name" autocomplete="car_name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="px-4 mt-4">
            <x-admin.label for="description" value="{{ __('Description') }}" />
            <textarea id="description" class="mt-1 focus:ring-purple-700 focus:purple-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                wire:model.defer="description" rows="3" autocomplete="car_description">
            </textarea>
        </div>

        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-2 md:grid-cols-3">
            <div class="px-4 mt-4">
                <x-admin.label for="active" value="{{ __('Active') }}" />

                <label for="active" class="inline-flex items-center">
                    <x-admin.checkbox id="active" wire:model="active" class="w-10 h-10 mt-1" />
                </label>
            </div>

            <!-- Car code -->
            <div class="px-4 mt-4">
                <x-admin.label for="car_code" value="{{ __('Car Code') }}" />
                <x-admin.input id="car_code" type="text" class="w-20 mt-1 block" maxlength="4" wire:model.defer="car_code" />
                <x-admin.input-help value="{{ __('(4 letters)') }}" />
                <x-admin.input-error for="car_code" class="mt-2" />
            </div>

            <!-- Year -->
            <div class="px-4 mt-4">
                <x-admin.label for="year" value="{{ __('Year') }}" />
                <x-admin.input id="year" type="number" class="w-20 mt-1 block" min="2000" max="{{now()->year}}" wire:model.defer="year" />
                <x-admin.input-error for="year" class="mt-2" />
            </div>
        </div>

        <hr class="mt-8 mb-4 px-4">

        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            {{-- Fleet Position --}}
            <div class="px-4 mt-4">
                <x-admin.label for="fleet_position" value="{{ __('Fleet Position') }}" />
                <x-admin.input id="fleet_position" type="number" class="w-20 mt-1 block" min="0" max="300" wire:model.defer="fleet_position" />
                <x-admin.input-help value="{{ __('Between 0 and 300') }}" />
                <x-admin.input-error for="fleet_position" class="mt-2" />
            </div>

            {{-- Score --}}
            <div class="px-4 mt-4">
                <x-admin.label for="ranking" value="{{ __('Score') }}" />
                <x-admin.input id="ranking" type="number" class="w-20 mt-1 block" min="0" max="10" wire:model.defer="ranking" />
                <x-admin.input-help value="{{ __('Between 0 and 10') }}" />
                <x-admin.input-error for="ranking" class="mt-2" />
            </div>

            {{-- Users Votes Number --}}
            <div class="px-4 mt-4">
                <x-admin.label for="users_number_votes" value="{{ __('Users Votes Number') }}" />
                <x-admin.input id="users_number_votes" type="number" class="w-20 mt-1 block" min="0" max="10000" wire:model.defer="users_number_votes" />
                <x-admin.input-help value="{{ __('Between 0 and 10000') }}" />
                <x-admin.input-error for="users_number_votes" class="mt-2" />
            </div>

            {{-- Minimum days booking --}}
            <div class="px-4 mt-4">
                <x-admin.label for="min_days_booking" value="{{ __('Minimum days booking') }}" />
                <x-admin.input id="min_days_booking" type="number" class="w-20 mt-1 block" min="0" max="50" wire:model.defer="min_days_booking" />
                <x-admin.input-error for="min_days_booking" class="mt-2" />
            </div>

            {{-- Preparation Time --}}
            <div class="px-4 mt-4">
                <x-admin.label for="min_preparation_time" value="{{ __('Preparation Time') }}" />
                <x-admin.input id="min_preparation_time" type="number" class="w-20 mt-1 block" min="0" max="7200" wire:model.defer="min_preparation_time" />
                <x-admin.input-help value="{{ __('In minutes') }}" />
                <x-admin.input-error for="min_preparation_time" class="mt-2" />
            </div>

            {{-- Adult Passengers --}}
            <div class="px-4 mt-4">
                <x-admin.label for="adult_passengers" value="{{ __('Adult Passengers') }}" />
                <x-admin.input id="adult_passengers" type="number" class="w-20 mt-1 block" min="1" max="50" wire:model.defer="adult_passengers" />
                <x-admin.input-error for="adult_passengers" class="mt-2" />
            </div>

            {{-- Doors --}}
            <div class="px-4 mt-4">
                <x-admin.label for="doors" value="{{ __('Doors') }}" />
                <x-admin.input id="doors" type="number" class="w-20 mt-1 block" min="1" max="50" wire:model.defer="doors" />
                <x-admin.input-error for="doors" class="mt-2" />
            </div>

            {{-- Luggage --}}
            <div class="px-4 mt-4">
                <x-admin.label for="luggage" value="{{ __('Luggage') }}" />
                <x-admin.input id="luggage" type="number" class="w-20 mt-1 block" min="1" max="50" wire:model.defer="luggage" />
                <x-admin.input-error for="luggage" class="mt-2" />
            </div>

            {{-- Total Units --}}
            <div class="px-4 mt-4">
                <x-admin.label for="units" value="{{ __('Total Units') }}" />
                <x-admin.input id="units" type="number" class="w-20 mt-1 block" min="1" max="50" wire:model.defer="units" />
                <x-admin.input-error for="units" class="mt-2" />
            </div>
        </div>

        <hr class="mt-8 mb-4 px-4">

        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            {{-- Engine --}}
            <div class="px-4 mt-4">
                <x-admin.label for="engine" value="{{ __('Engine') }}" />
                <select id="engine" name="engine" wire:model="engine"
                    class="disable-arrow block w-32 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    @foreach(config('car-specs.engine') as $specEngine)
                        <option value="{{$specEngine}}">{{ ucwords($specEngine) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Transmission --}}
            <div class="px-4 mt-4">
                <x-admin.label for="transmission" value="{{ __('Transmission') }}" />
                <select id="transmission" name="transmission" wire:model="transmission"
                    class="disable-arrow block w-32 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    @foreach(config('car-specs.transmission') as $specTransmission)
                        <option value="{{$specTransmission}}">{{ ucwords($specTransmission) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Vehicle Type --}}
            <div class="px-4 mt-4">
                <x-admin.label for="vehicle_type" value="{{ __('Vehicle Type') }}" />
                <select id="vehicle_type" name="vehicle_type" wire:model="vehicle_type"
                    class="disable-arrow block w-32 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    @foreach(config('car-specs.type') as $specType)
                        <option value="{{$specType}}">{{ ucwords($specType) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Vehicle Brand --}}
            <div class="px-4 mt-4">
                <x-admin.label for="vehicle_brand" value="{{ __('Vehicle Brand') }}" />
                <select id="vehicle_brand" name="vehicle_brand" wire:model="vehicle_brand"
                    class="disable-arrow block w-32 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    @foreach(config('car-specs.brand') as $specBrand)
                        <option value="{{$specBrand}}">{{ ucwords($specBrand) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Vehicle Class --}}
            <div class="px-4 mt-4">
                <x-admin.label for="vehicle_class" value="{{ __('Vehicle Class') }}" />
                <select id="vehicle_class" name="vehicle_class" wire:model="vehicle_class"
                    class="disable-arrow block w-32 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    @foreach(config('car-specs.class') as $specClass)
                        <option value="{{$specClass}}">{{ ucwords($specClass) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- F-Roads Name --}}
            <div class="px-4 mt-4">
                <x-admin.label for="f_roads_name" value="{{ __('F-Roads Name') }}" />
                <select id="f_roads_name" name="f_roads_name" wire:model="f_roads_name"
                    class="disable-arrow block w-32 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    @foreach(config('car-specs.road') as $specRoad)
                        <option value="{{$specRoad}}">{{ strtoupper($specRoad) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr class="mt-8 mb-4 px-4">
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
