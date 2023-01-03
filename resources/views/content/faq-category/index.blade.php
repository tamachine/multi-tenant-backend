<x-admin-layout>
    <x-slot name="title">
        {{ __('FAQ Categories') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>    
    
    <x-slot name="action">
        <x-admin.action route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>
    
    <livewire:content.faq-category.index />   
</x-admin-layout>
