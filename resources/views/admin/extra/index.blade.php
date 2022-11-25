<x-admin-layout>
    <x-slot name="title">
        {{ __('Extras') }}
    </x-slot>

    <x-slot name="action">
        <x-admin.action route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <livewire:admin.extra.index />
</x-admin-layout>