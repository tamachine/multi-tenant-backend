<div x-data="{
    featuredImageUrl: '{{ $blogPost->featured_image_url }}',
    featuredImageHoverUrl: '{{ $blogPost->featured_image_hover_url }}',
    showHoveredImage: false
}">
    <div
        class="h-[260px] rounded-lg bg-cover"
        :style="'background-image: url(' + (showHoveredImage && featuredImageHoverUrl ? featuredImageHoverUrl : featuredImageUrl) + ')'"
        @mouseenter="featuredImageHoverUrl && (showHoveredImage = true)"
        @mouseleave="showHoveredImage = false"
    >
        <div
            class="absolute top-0 left-0 bottom-0 z-0 h-[495px] w-full bg-cover rounded-2xl"
            :style="'background-image: linear-gradient(30.78deg, rgb(255, 10, 84, 0.3) -37.85%, rgba(0, 0, 0, 0) 68.21%), url(' + featuredImageUrl + ')'"
            x-transition:enter="transition ease-out duration-500 opacity-0"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-500 opacity-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-show="!showHoveredImage"
        ></div>

        <div class="bg-black/50 h-full w-full p-3 md:p-5 rounded-lg">
            <div class="flex flex-col justify-end items-start h-full">
                <x-reading-time-icon time="{{ __('blog.time') }}" />
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-2">
        <div class="font-fredoka-semibold text-[22px] md:text-2xl text-left">
            <a href="{{ $blogPost->url }}">{!! $blogPost->title !!}</a>
        </div>

        <div class="text-sm md:text-base text-gray-400">
            {{ __('blog.by') }} <a href="#" class="text-black"> {!! $blogPost->author->name !!} </a>
        </div>

        <div>
            @foreach($blogPost->tags as $tag)
                <x-blog-tag :blog-tag="$tag" />
            @endforeach
        </div>
    </div>
</div>
