<x-admin.form-section submit="store"  formClass="block">
    <x-slot name="title">
        {{ __('Create Insurance feature') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter the new Insurance feature details') }}
    </x-slot>

    @include('livewire.admin.insurance-feature.partial.form')

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ __('Save Insurance fetaure') }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
