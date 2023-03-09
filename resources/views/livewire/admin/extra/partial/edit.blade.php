<x-admin.form-section submit="saveExtra" formClass="block">
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
            <a href="{{route('intranet.vendor.edit', $vendor_id)}}" target="_blank"
                class="text-purple-700 hover:underline"
            >
                {{$vendor_name}}
            </a>
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
            <!-- Active -->
            <div class="px-4 mt-4">
                <x-admin.label for="active" value="{{ __('Active') }}" />

                <label for="active" class="inline-flex items-center">
                    <x-admin.checkbox id="active" wire:model="active" class="w-10 h-10 mt-1" />
                </label>
            </div>

           <!-- Included -->
           <div class="px-4 mt-4">
                <x-admin.label for="included" value="{{ __('Included') }}" />

                <label for="included" class="inline-flex items-center">
                    <x-admin.checkbox id="included" wire:model="included" class="w-10 h-10 mt-1" />
                </label>
            </div>

            <!-- Premium Insurance -->
           <div class="px-4 mt-4">
                <x-admin.label-tooltip for="insurance_premium" value="{{ __('Premium insurance') }}" tooltip="If the extra is configured as Premium insurance and it is selected by the users, they will not be able to select another insurance for this car" />

                <label for="insurance_premium" class="inline-flex items-center">
                    <x-admin.checkbox id="insurance_premium" wire:model="insurance_premium" class="w-10 h-10 mt-1" />
                </label>
            </div>
        </div>

        <hr class="mt-8 mb-4 px-4">

        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-2 md:grid-cols-3">
            @if ($caren)
                <div class="px-4 mt-4">
                    This extra was added from Caren.
                    <br>
                    You can't modify the price.
                </div>
            @else
                <!-- Price -->
                <div class="px-4 mt-4">
                    <x-admin.label-tooltip for="price" value="{{ __('Price') }}" tooltip="If the extra is configured as 'Included' the price will be zero" />

                    @if ($included)
                        <div class="mt-2 font-bold">
                            0 ISK
                        </div>
                    @else
                        <x-admin.input id="price" type="number" class="w-20 mt-1 block" min="0" wire:model.defer="price"/>
                        <x-admin.input-help value="{{ __('In ISK') }}" />
                        <x-admin.input-error for="price" class="mt-2" />
                    @endif
                </div>

                <!-- Maximum Price -->
                <div class="px-4 mt-4">
                    <x-admin.label-tooltip for="maximum_fee" value="{{ __('Maximum Price') }}" tooltip="If the extra is configured as 'Included' the price will be zero" />

                    @if ($included)
                        <div class="mt-2 font-bold">
                            0 ISK
                        </div>
                    @else
                        <x-admin.input id="maximum_fee" type="number" class="w-20 mt-1 block" min="0" wire:model.defer="maximum_fee" />
                        <x-admin.input-help value="{{ __('In ISK') }}" />
                        <x-admin.input-error for="maximum_fee" class="mt-2" />
                    @endif
                </div>
            @endif

            <!-- Max Units -->
           <div class="px-4 mt-4">
                <x-admin.label for="max_units" value="{{ __('Max Units') }}" />

                <x-admin.input id="max_units" type="number" class="w-20 mt-1 block" min="1" wire:model.defer="max_units" />
                <x-admin.input-error for="max_units" class="mt-2" />
            </div>
        </div>

        <hr class="mt-8 mb-4 px-4">

        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-2 md:grid-cols-3">
            {{-- Price Mode --}}
            <div class="px-4 mt-4">
                <x-admin.label for="price_mode" value="{{ __('Price Mode') }}" />
                <select id="price_mode" name="price_mode" wire:model="price_mode"
                    class="disable-arrow block w-32 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    @foreach(config('extras.price_mode') as $priceModeKey => $priceModeText)
                        <option value="{{$priceModeKey}}">{{ ucwords($priceModeText) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Category --}}
            <div class="px-4 mt-4">
                <x-admin.label for="category" value="{{ __('Category') }}" />
                <select id="category" name="category" wire:model="category"
                    class="disable-arrow block w-32 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    @foreach(config('extras.category') as $categoryKey => $categoryText)
                        <option value="{{$categoryKey}}">{{ ucwords($categoryText) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
