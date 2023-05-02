@props(['submit', 'formClass'])

<x-admin.section>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="description">{{ $description }}</x-slot>
    
    <x-slot name="section">
        <form class="space-y-6" wire:submit.prevent="{{ $submit }}">
            <div class="{{isset($formClass) ? $formClass : 'md:grid md:gap-4 md:grid-cols-2 xl:grid-cols-3'}}">
                {{ $form }}
            </div>

            @if (isset($actions))
                <div class="flex justify-end px-4 mt-4">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </x-slot>


</x-admin.section>