<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Pages') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <x-slot name="backTo">
        <x-admin.back-to route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>
     
    <livewire:common.seo-configurations :instance="$page"/>
</x-admin-layout>