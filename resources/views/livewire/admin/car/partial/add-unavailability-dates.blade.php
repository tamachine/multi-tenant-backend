<x-admin.form-section submit="addDate">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Start Date -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="start_date" value="{{ __('Start date') }}" />

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

        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="end_date" value="{{ __('End date') }}" />

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
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
