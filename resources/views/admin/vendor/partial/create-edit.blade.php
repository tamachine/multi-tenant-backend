<x-admin.form-section submit="saveVendor">
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
            <x-admin.input id="name" type="text" class="mt-1 block w-full" maxlength="80" wire:model.defer="name" autocomplete="name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        @if(!$edit && config('settings.booking_enabled.caren') && count($caren_vendors))
            <!-- Caren Vendor -->
            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="caren_vendor" value="{{ __('Caren Vendor') }}" />
                <select id="caren_vendor" name="caren_vendor" wire:model="caren_vendor"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    <option value="">Select Vendor</option>
                    @foreach ($caren_vendors as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>
                <x-admin.input-error for="caren_vendor" class="mt-2" />
            </div>
        @endif

        <!-- Vendor Code -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="vendor_code" value="{{ __('Vendor Code') }}" />
            <x-admin.input id="vendor_code" type="text" class="mt-1 block w-full" maxlength="11" wire:model.defer="vendor_code" autocomplete="vendor_code" />
            <x-admin.input-error for="vendor_code" class="mt-2" />
        </div>

        <!-- Service Fee -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="service_fee" value="{{ __('Service Fee') }}" />
            <x-admin.input id="service_fee" type="number" class="mt-1 block w-full" wire:model.defer="service_fee" autocomplete="service_fee" />
            <x-admin.input-error for="service_fee" class="mt-2" />
        </div>

        <!-- Status -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="status" value="{{ __('Status') }}" />
            <select id="status" name="status" wire:model="status"
                class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
            >
                <option value="active">{{ __('Active') }}</option>
                <option value="hidden">{{ __('Hidden') }}</option>
            </select>
            <x-admin.input-error for="status" class="mt-2" />
        </div>

        <!-- Brand Color -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="brand_color" value="{{ __('Brand Color') }}" />
            <x-admin.color-picker wire:model="brand_color" :model="$brand_color"/>
            <x-admin.input-error for="brand_color" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>

@push('scripts')
    <script src="https://unpkg.com/vanilla-picker@2"></script>
@endpush
