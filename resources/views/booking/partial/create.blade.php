<x-admin.form-section submit="saveBooking">
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
            <select id="vendor" name="vendor" wire:model="vendor"
                class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
            >
                <option value="">Select Vendor</option>
                @foreach ($vendors as $id => $name)
                    <option value="{{$id}}">{{ $name }}</option>
                @endforeach
            </select>
            <x-admin.input-error for="vendor" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
