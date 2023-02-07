<x-admin-layout>
    <x-slot name="headScripts">
        @include('admin.partial.tinymce-script')
    </x-slot>

    <x-slot name="title">
        {{ __('Edit Author:') }} {{$author->name}}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <x-slot name="backTo">
        <x-admin.back-to route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <div class="space-y-6 p-10">
        <livewire:blog.author.edit :author="$author" />
    </div>
</x-admin-layout>
