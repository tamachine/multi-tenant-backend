<div
    class="h-[530px] md:h-[560px] w-full rounded-lg bg-cover transition-all duration-300"
    x-data="{ backgroundImage: '{{ $blogPost->featured_image_url }}' }"
    :style="'background-image: url(' + backgroundImage + ');'"
    x-on:mouseover="backgroundImage = '{{ $blogPost->featured_image_hover_url }}'"
    x-on:mouseout="backgroundImage = '{{ $blogPost->featured_image_url }}'"
>
    <div class="bg-black/50 h-full w-full p-3 md:p-10 rounded-lg">
        <div class="flex flex-col justify-between h-full">
            @include('components.posts-summary.featured-post-top-info')

            @include('components.posts-summary.featured-post-bottom-info')
        </div>
    </div>
</div>
