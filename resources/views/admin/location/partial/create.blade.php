<x-admin.form-section submit="saveLocation">
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
            <x-admin.input id="name" type="text" class="mt-1 block" maxlength="255" wire:model.defer="name" autocomplete="location_name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        @if (config('settings.booking_enabled.caren'))
            <!-- Caren Location -->
            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="caren_location" value="{{ __('Caren Location') }}" />
                <select id="caren_location" name="caren_location" wire:model="caren_location"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    <option value="">Select Location</option>
                    @foreach ($caren_locations as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>
                <x-admin.input-error for="caren_location" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
