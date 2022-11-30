<x-admin-layout>
    <x-slot name="title">
        {{ __('Intranet users') }}
    </x-slot>

    <x-slot name="action">
        <x-admin.action route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <livewire:admin.user.index />
</x-admin-layout>
