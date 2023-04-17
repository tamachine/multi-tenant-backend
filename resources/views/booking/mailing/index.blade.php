<x-admin-layout>
    <x-slot name="title">
        {{ __('Mailing') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <div class="p-4 sm:p-10">
        <livewire:booking.mailing.customers />
    </div>
</x-admin-layout>

