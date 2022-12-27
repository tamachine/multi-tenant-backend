<div wire:loading.class="hidden">
    @include('livewire.admin.vendor.partial.create-edit', [
        'formTitle'         => __('Edit Vendor'),
        'formDescription'   => __('Update the basic details'),
        'formButton'        => __('Save Vendor'),
    ])

    <div class="mt-10">
        @include('livewire.admin.vendor.partial.logo-upload', [
            'formTitle'         => __('Upload logo'),
            'formDescription'   => __('Upload the vendor\'s logo'),
            'formButton'        => __('Save Logo'),
        ])
    </div>

    <div class="mt-10">
        <x-admin.form-section submit="render">
            <x-slot name="title">
                {{ __('Delete Vendor') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Click on the button to delete this vendor') }}
            </x-slot>

            <x-slot name="form">
            </x-slot>

            <x-slot name="actions">
                <x-admin.delete-item
                    trigger="Delete Vendor"
                    title="Delete Vendor"
                    class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                    name="{{ $vendor->name }}"
                    hashid="{{ $vendor->hashid }}"
                />
            </x-slot>
        </x-admin.form-section>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-element', event => {
            @this.call('deleteVendor')
        });
    </script>
@endpush
