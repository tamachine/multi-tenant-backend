<div class="relative  min-h-[495px] rounded-2xl overflow-hidden
    @if($hover != '') 
        hover-change-image
    @else
        hover-no-image
    @endif ">   

    <x-background-hover-transition 
        :image="$image" 
        :hover="$hover" 
        class="gradient-pink"
    />

    <div class="relative px-5 py-7 h-full flex flex-col justify-between">
        <div class="flex-grow mb-4 md:mb-8">
            <x-reading-time-icon time="{{ $time }}" />
        </div>
        <div class="drop-shadow-text text-white">
            <div class="font-fredoka-semibold text-3xl">{{ $title }}</div>
            <div class="font-sans-medium md:text-base text-lg">{{ $text }}</div>
        </div>
    </div>  
</div>