<x-admin-layout>
    <x-slot name="title">
        {{ __('Free Day Plans') }}
    </x-slot>

    <x-slot name="action">
        <x-admin.action route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <livewire:admin.free-day.index />
</x-admin-layout>
