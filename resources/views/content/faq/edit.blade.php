<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit FAQ') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <x-slot name="backTo">
        <x-admin.back-to route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>
     
    <livewire:content.faq.edit :faq="$faq" />        
</x-admin-layout>
