<x-admin-layout>
    <x-slot name="title">
        {{ __('Create FAQ Category') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <x-slot name="backTo">
        <x-admin.back-to route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <div class="space-y-6 p-10">
        <livewire:content.faq-category.create  />
    </div>
</x-admin-layout>