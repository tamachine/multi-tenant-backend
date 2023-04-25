<div class="px-4 mt-4">            
    <x-admin.label for="image" value="Upload images" class="mb-2" />
    <livewire:common.featured-image-upload text="Upload images" :model="$post" :wire:key="$post->hashid" />

</div>
