<x-admin-layout>
    <x-slot name="title">
        {{ __('SEO Configurations') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>    

    <livewire:content.seo-configuration.index />
</x-admin-layout>
