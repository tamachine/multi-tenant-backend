<x-admin-layout>
    <x-slot name="title">
        Newsletter Users
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>    

    <livewire:admin.newsletter-user.index />
</x-admin-layout>
