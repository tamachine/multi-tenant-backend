<div class="px-4">
    @if (count($images))
        <x-admin.label for="current_images" value="{{ __('Current images for this post. Copy the URL to use it as an image source in the content editor.') }}" />

        <div class="grid sm:grid-cols-2 lg:grid-cols-3">
            @foreach($images as $key => $image)
                <div class="p-4">
                    <div class="h-64 mx-auto text-center break-all">
                        <img src="{{asset('storage/' . $image['file'])}}" class="h-40 mx-auto">

                        <div class="mt-4 px-2">
                            {{asset('storage/' . $image['file'])}}
                        </div>

                        <div class="mt-4">
                            <a href="javascript:void(0);"
                                class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150"
                                wire:click="deleteImage('{{$image['file']}}')"
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
        <x-admin.label for="current_images" value="{{ __('The post has no images yet') }}" />
    @endif

    <x-admin.label for="new_image" value="{{ __('Select an image and click on ″Add new image″') }}" />

    <div class="mt-2 sm:flex items-center">
        <div class="sm:w-1/3">
            <input type="file" class="mt-2"
                name="image" id="image"
                wire:model="image"
            >

            <x-admin.input-error for="image" class="mt-2" />

            <button class="mt-2 inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                type="button"
                wire:click="addImage()"
                wire:loading.attr="disabled"
            >
                Add new image
            </button>
        </div>
    </div>
</div>
