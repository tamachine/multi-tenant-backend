<x-admin-layout>
    <x-slot name="title">
        {{ __('Web translations') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>    

    <livewire:content.translation.index />
</x-admin-layout>
