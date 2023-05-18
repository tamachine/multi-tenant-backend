<div {!! $attributes->merge(['class' => 'bg-image image-wrapper']) !!}>
    <img src="{{ $image }}" alt="" class="relative">
    
    @if($hover != '')
        <img src="{{ $hover }}" alt="" class="image-hover absolute top-0 left-0 bottom-0 w-full">
    @endif
</div>