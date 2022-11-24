<x-admin.form-section submit="saveImages" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if (count($current))
            <h3 class="text-xl font-bold mb-10">Current images</h3>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3">
                @foreach($current as $key => $image)
                    <div class="p-4">
                        <div class="h-64 mx-auto text-center">
                            <img src="{{asset('storage/car/' . $car->hashid . '/' . $image['file'])}}" class="h-40 mx-auto">

                            <div class="mt-4">
                                <label for="main_{{ $key }}" class="inline-flex items-center">
                                    <x-admin.checkbox id="main_{{ $key }}" wire:model="current.{{ $key }}.main" wire:click="checkMain('{{$key}}')" />
                                    <span class="ml-2">Main image</span>
                                </label>
                            </div>

                            <div class="mt-4">
                                <a href="javascript:void(0);"
                                    class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    wire:click="deleteImage('{{$key}}')"
                                >
                                    Delete Image
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="my-8 px-4">
        @else
            <h3 class="text-xl font-bold mb-10">This car has no images yet</h3>
        @endif

        <h3 class="text-xl font-bold mb-10">Add new images</h3>

        @for ($i = 0; $i < count($images); $i++)
            <div class="sm:flex items-center">
                <div class="sm:w-1/3">
                    <x-admin.label for="image_{{$i}}" value="{{__('Image')}} {{$i + 1}}" />

                    <input type="file" class="mt-2"
                        name="image_{{ $i }}" id="image_{{ $i }}"
                        wire:model="images.{{ $i }}"
                    >

                    <x-admin.input-error for="images.{{ $i }}" class="mt-2" />
                </div>

                @if (isset($images[$i]))
                    <div class="mt-4 sm:mt-0 sm:mx-4 sm:w-1/3 text-center">
                        <img src="{{$images[$i]->temporaryUrl()}}">
                    </div>

                    @if ($i == count($images) - 1)
                        <div class="mt-4 sm:mt-0 sm:w-1/3 text-center">
                            <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                                type="button"
                                wire:click="addImage()"
                            >
                                Add another image
                            </button>
                        </div>
                    @endif
                @endif
            </div>

            <hr class="my-8 px-4">
        @endfor
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
