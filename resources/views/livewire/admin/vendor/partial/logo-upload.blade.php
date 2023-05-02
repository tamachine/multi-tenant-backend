<x-admin.form-section submit="">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <livewire:common.featured-image-upload :model="$vendor" text="" />
    </x-slot>
</x-admin.form-section>
