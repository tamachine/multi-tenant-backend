<x-admin.form-section submit="addExtras">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Extras loop -->
        @foreach($availableExtras as $key => $availableExtra)
            <div class="px-4 mt-2">
                <label for="availableExtras_{{ $key }}" class="inline-flex items-center">
                    <x-admin.checkbox id="availableExtras_{{ $key }}" wire:model="availableExtras.{{ $key }}.selected" />
                    <span class="ml-3">
                        <a href="{{route('intranet.caren.edit', $availableExtra["id"])}}" target="_blank"
                            class="text-purple-700 hover:underline"
                        >
                            {{$availableExtra["name"]}}
                        </a>
                    </span>
                </label>
            </div>
        @endforeach
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
