<x-admin-layout>
    <x-slot name="title">
        {{ __('Page configurations') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>    

    <livewire:content.page.index />
</x-admin-layout>
