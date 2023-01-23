<div class="p-4 sm:p-10">
    <x-admin.form-section submit="update"  formClass="block">
        <x-slot name="title">
            {{ __('Edit Insurance feature') }}
        </x-slot>

        <x-slot name="description">
            {{ $insuranceFeature->name }}
        </x-slot>

        @include('livewire.admin.insurance-feature.partial.form', ['insuranceFeature' => $insuranceFeature])

        <x-slot name="actions">
            <x-admin.button wire:loading.attr="disabled">
                {{ __('Update Insurance feature') }}
            </x-admin.button>
        </x-slot>
    </x-admin.form-section>

    <div class="mt-10">
        <x-admin.form-section submit="render">
            <x-slot name="title">
                {{ __('Delete Insurance feature') }}
            </x-slot>

            <x-slot name="description">                
                {{ __('Click on the button to delete this Insurance feature') }}                
            </x-slot>

            <x-slot name="form">
            </x-slot>

            <x-slot name="actions">
                <x-admin.delete-item
                    trigger="Delete Insurance feature"
                    title="Delete Insurance feature"
                    class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                    name="{{ $insuranceFeature->name }}"
                    hashid="{{ $insuranceFeature->hashid }}"
                />
            </x-slot>
            
        </x-admin.form-section>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-element', event => {
            @this.call('delete')
        });
    </script>
@endpush
