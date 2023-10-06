<div>
    @include('livewire.admin.rate.partial.create-edit', [
        'formTitle'         => __('Edit Exchange Rate'),
        'formDescription'   => __('Update the exchange rate details'),
        'formButton'        => __('Save Exchange Rate'),
    ])

    <div class="mt-10">
        <x-admin.form-section submit="render">
            <x-slot name="title">
                {{ __('Delete Exchange Rate') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Click on the button to delete this exchange rate') }}
            </x-slot>

            <x-slot name="form">
            </x-slot>

            <x-slot name="actions">
                <x-admin.delete-item
                    trigger="Delete Exchange Rate"
                    title="Delete Exchange Rate"
                    class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                    name="{{ $currency->name }}"
                    hashid="{{ $currency->hashid }}"
                />
            </x-slot>
        </x-admin.form-section>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-element', event => {
            @this.call('deleteRate')
        });
    </script>
@endpush
