<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Contact:') }} {{$contactUser->name}}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <x-slot name="backTo">
        <x-admin.back-to route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <livewire:admin.contact-user.edit :contactUser="$contactUser" />

</x-admin-layout>