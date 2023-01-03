<x-admin.form-section submit="store"  formClass="block">
    <x-slot name="title">
        {{ __('Create FAQ Category') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter the new FAQ Category details') }}
    </x-slot>

    @include('livewire.content.faq-category.partial.form')

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ __('Save FAQ Category') }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
