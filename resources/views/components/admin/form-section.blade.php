@props(['submit', 'formClass'])

<div {{ $attributes->merge(['class' => 'bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6']) }}>
    <div class="md:flex">
        <x-admin.section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-admin.section-title>

        <div class="md:w-3/4 mt-8 md:mt-0">
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
        </div>
    </div>
</div>
