<div wire:loading.class="hidden">
    @include('admin.car.partial.edit', [
        'formTitle'         => __('Edit Car'),
        'formDescription'   => __('Enter the car details'),
        'formButton'        => __('Save Car'),
    ])

    <div class="mt-10">
        <x-admin.form-section submit="render">
            <x-slot name="title">
                {{ __('Delete Car') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Click on the button to delete this car') }}
            </x-slot>

            <x-slot name="form">
            </x-slot>

            <x-slot name="actions">
                <x-admin.delete-item
                    trigger="Delete Car"
                    title="Delete Car"
                    class="inline-flex items-center px-4 py-4 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150"
                    name="{{ $car->name }}"
                    hashid="{{ $car->hashid }}"
                />
            </x-slot>
        </x-admin.form-section>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-element', event => {
            @this.call('deleteCar')
        });
    </script>
@endpush
