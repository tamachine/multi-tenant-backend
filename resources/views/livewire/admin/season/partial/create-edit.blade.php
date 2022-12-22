<x-admin.form-section submit="saveSeason">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="name" value="{{ __('Name') }}" />
            <x-admin.input id="name" type="text" class="mt-1 block" maxlength="255" wire:model.defer="name" autocomplete="name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Vendor -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="vendor" value="{{ __('Vendor') }}" />
            <select id="vendor" name="vendor" wire:model="vendor"
                class="disable-arrow block w-auto h-10 mt-1 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
            >
                <option value="">Select Vendor</option>
                @foreach ($vendors as $id => $name)
                    <option value="{{$id}}">{{ $name }}</option>
                @endforeach
            </select>
            <x-admin.input-error for="vendor" class="mt-2" />
        </div>

        <!-- Minimum days -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="min_days_season" value="{{ __('Minimum Days') }}" />
            <x-admin.input id="min_days_season" type="number" class="w-20 mt-1 block" min="1" max="50" wire:model.defer="min_days_season" />
            <x-admin.input-error for="min_days_season" class="mt-2" />
        </div>

        <!-- Start Date -->
        <div class="px-4 mt-4">
            <x-admin.label for="date" value="{{ __('Start Date') }}" />

            <x-admin.date-picker
                name="start_date"
                placeholder="Click to select date"
                :yearRange="[
                    now()->format('Y'),
                    now()->addYears(2)->format('Y')
                ]"
                autocomplete="off"
                is-wire="true"
                variable="start_date"
            />

            <x-admin.input-error for="start_date" class="mt-2" />
        </div>

        <!-- End Date -->
        <div class="px-4 mt-4">
            <x-admin.label for="date" value="{{ __('End Date') }}" />

            <x-admin.date-picker
                name="end_date"
                placeholder="Click to select date"
                :yearRange="[
                    now()->format('Y'),
                    now()->addYears(2)->format('Y')
                ]"
                autocomplete="off"
                is-wire="true"
                variable="end_date"
            />

            <x-admin.input-error for="end_date" class="mt-2" />
        </div>

        <!-- Season Discount -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="season_discount" value="{{ __('Season Discount') }}" />
            <x-admin.input id="season_discount" type="number" class="w-20 mt-1 block" min="0" max="99" wire:model.defer="season_discount" />
            <x-admin.input-error for="season_discount" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
