<x-admin.form-section submit="store"  formClass="block">
    <x-slot name="title">
        {{ __('Create FAQ') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter the new FAQ details') }}
    </x-slot>

    @include('livewire.content.faq.partial.translations-form')

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ __('Save FAQ') }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
