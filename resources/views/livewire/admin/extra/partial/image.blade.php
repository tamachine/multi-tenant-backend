<x-admin.section>
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="section">
        <livewire:common.featured-image-upload :model="$extra" text="Extra image" />
    </x-slot>
</x-admin.section>
