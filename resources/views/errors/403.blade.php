<x-admin-layout>
    <x-slot name="title">
        {{ __('Forbidden') }}
    </x-slot>

    <div class="p-5 bg-black">
        <img src="{{ asset('images/admin/errors/403.jpg') }}" class="mx-auto" />
    </div>
</x-admin-layout>
