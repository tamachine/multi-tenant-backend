<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Season:') }} {{$seasonName}}
    </x-slot>

    <x-slot name="backTo">
        <x-admin.back-to route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <div class="space-y-6 p-10">
        <livewire:admin.season.edit :season="$season" />
    </div>
</x-admin-layout>
