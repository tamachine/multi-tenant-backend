<x-admin.section>
    <x-slot name="title">
        Images
    </x-slot>

    <x-slot name="description">
        Images
    </x-slot>

    <x-slot name="section">
        <div class="flex flex-col gap-2">
            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="featured_image" value="Main image" class="mb-4"/>
                <livewire:common.featured-image-upload text="Upload main image" :model="$car"  />
            </div>

            <hr class="my-8">

            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="featured_image_hover" value="Hover image" class="mb-4"/>
                <livewire:common.featured-image-hover-upload text="Upload hover image" :model="$car"  />
            </div>

            <hr class="my-8">

            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="images" value="Car images" class="mb-4"/>
                <livewire:common.image-gallery :model="$car" />
                <livewire:common.image-upload text="Upload car image" :model="$car"  />
            </div>

            
        </div>
    </x-slot>
</x-admin.form-section>