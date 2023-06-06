<div {!! $attributes->merge(['class' => 'bg-image image-wrapper']) !!}>
    <x-image path="{{ $image }}" class="relative" />
    
    @if($hover != '')
        <x-image path="{{ $hover }}" class="image-hover absolute top-0 left-0 bottom-0 w-full" />
    @endif
</div>