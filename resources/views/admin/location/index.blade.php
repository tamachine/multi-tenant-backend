<x-admin-layout>
    <x-slot name="title">
        {{ __('Locations') }}
    </x-slot>

    <x-slot name="action">
        <x-admin.action route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <livewire:admin.location.index />
</x-admin-layout>
