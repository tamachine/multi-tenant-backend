<div class="px-4">
    @if (count($images))
        <x-admin.label for="current_images" value="{{ __('Current images for this post. Copy the URL to use it as an image source in the content editor.') }}" />

        <div class="grid sm:grid-cols-2 lg:grid-cols-3">
            @foreach($images as $image)
                <div class="p-4">
                    <div class="h-64 mx-auto text-center break-all">
                    
                        <img src="{{asset('storage/' . $image)}}" class="h-40 mx-auto">

                        <div class="mt-4 px-2">
                            {{asset('storage/' . $image)}}
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>

        <hr class="my-8 px-4">
    @else
        <x-admin.label for="current_images" value="{{ __('The post has no images yet') }}" />
    @endif

   
    
    
</div>

<div class="px-4 mt-4">            
    <x-admin.label for="image" value="Featured image" class="mb-2" />
    <livewire:common.featured-image-upload text="Upload featured image" :model="$post" :wire:key="$post->hashid" />

</div>
