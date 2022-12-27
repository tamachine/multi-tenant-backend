<x-admin.form-section submit="saveEarlyBird" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <div class="mt-8 md:mt-0 grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 xl:grid-cols-8 2xl:grid-cols-10">
            @foreach ($early_bird as $key => $discount)
                <div class="text-center">
                    <x-admin.label for="early_bird_{{ $key }}" value="{{ earlyBirdMonths($key) }}" />
                    <x-admin.input id="early_bird_{{ $key }}" wire:model="early_bird.{{ $key }}"
                        type="number" step="any" class="mt-1 w-16" />
                    <x-admin.input-error for="early_bird.{{ $key }}" class="mt-2" />
                </div>
            @endforeach
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
