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
                <div class="flex justify-between items-center">
                    <div>
                        <label for="availableExtras_{{ $key }}" class="inline-flex items-center">
                            <x-admin.checkbox id="availableExtras_{{ $key }}" wire:model="availableExtras.{{ $key }}.selected" />
                            <span class="ml-3">
                                {{$availableExtra["name"]}}
                            </span>
                        </label>
                    </div>

                    <div class="ml-2">
                        <select id="units_{{ $key }}" name="units_{{ $key }}" wire:model="availableExtras.{{ $key }}.units"
                            class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                        >
                            @for($i=1; $i<=$availableExtra["max_units"]; $i++)
                                <option value="{{$i}}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        @endforeach
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
