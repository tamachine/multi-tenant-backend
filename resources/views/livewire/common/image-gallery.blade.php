<div class="grid grid-cols-3 gap-2">
    @foreach($images as $key => $image)        
        <x-admin.image-card :image-url="$model->getImageUrl($image)" wire-action="deleteImage({{$key}})" />
    @endforeach
</div>
