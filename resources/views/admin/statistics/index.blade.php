<x-admin-layout>
    <x-slot name="title">
        {{ __('Statistics') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <livewire:admin.statistics.index />
</x-admin-layout>
