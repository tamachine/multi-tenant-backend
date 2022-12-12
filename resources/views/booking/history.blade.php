<x-admin-layout>
    <x-slot name="title">
        {{ __('Booking History') }}
    </x-slot>

    <x-slot name="action">
        <x-admin.action route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <livewire:booking.history />
</x-admin-layout>
