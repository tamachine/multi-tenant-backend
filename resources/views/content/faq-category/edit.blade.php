<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit FAQ Category') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <x-slot name="backTo">
        <x-admin.back-to route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>
     
    <livewire:content.faq-category.edit :faqCategory="$faqCategory" />        
</x-admin-layout>
