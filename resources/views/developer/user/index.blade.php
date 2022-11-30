<x-admin-layout>
    <x-slot name="title">
        {{ __('Developer users') }}
    </x-slot>

    <x-slot name="action">
        <x-admin.action route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <livewire:developer.user.index />
</x-admin-layout>
