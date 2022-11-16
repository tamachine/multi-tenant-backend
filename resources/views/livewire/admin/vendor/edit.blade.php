<div wire:loading.class="hidden">
    @include('admin.vendor.partial.create-edit', [
        'formTitle'         => __('Edit Vendor'),
        'formDescription'   => __('Update the basic details'),
        'formButton'        => __('Save Vendor'),
    ])

    <div class="mt-10">
        @include('admin.vendor.partial.logo-upload', [
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
                    class="inline-flex items-center px-4 py-4 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150"
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
            @this.call('deleteVendor', event.detail.hashid)
        });
    </script>
@endpush
