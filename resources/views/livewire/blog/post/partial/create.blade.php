<x-admin.form-section submit="savePost" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Title -->
        <div class="px-4">
            <x-admin.label for="title" value="{{ __('Title') }}" />
            <x-admin.input id="title" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="title" autocomplete="post_title" />
            <x-admin.input-error for="title" class="mt-2" />
        </div>

        <div class="w-full mt-4 sm:grid sm:gap-2 sm:grid-cols-2">
            {{-- Category --}}
            <div class="px-4">
                <x-admin.label for="category" value="{{ __('Category') }}" />
                <select id="category" name="category" wire:model="category"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    <option value="">{{ __('Select category') }}</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>

                <x-admin.input-error for="category" class="mt-2" />
            </div>

            {{-- Author --}}
            <div class="px-4 mt-4 sm:mt-0">
                <x-admin.label for="author" value="{{ __('Author') }}" />
                <select id="author" name="author" wire:model="author"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    <option value="">{{ __('Select author') }}</option>
                    @foreach ($authors as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>

                <x-admin.input-error for="author" class="mt-2" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
