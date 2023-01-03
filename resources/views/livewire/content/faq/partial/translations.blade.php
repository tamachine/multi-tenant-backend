<x-admin.form-section submit="update"  formClass="block">
    <x-slot name="title">
        {{ __('Edit FAQ') }}
    </x-slot>

    <x-slot name="description">
        {{ $faq->question }}
    </x-slot>

    @include('livewire.content.faq.partial.translations-form', ['faq' => $faq])

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ __('Update FAQ') }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>        