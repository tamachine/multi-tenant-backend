<div
    x-data="{ image: '{{ $blogPost->featured_image_url }}' }"
    x-on:mouseenter="image= '{{ $blogPost->featured_image_hover_url != '' ? $blogPost->featured_image_hover_url : $blogPost->featured_image_url }}'"
    x-on:mouseleave="image= '{{ $blogPost->featured_image_url }}'"   
    class="h-[530px] md:h-[560px] w-full rounded-lg bg-cover relative"    
    >

    <x-background-hover-transition :image="$blogPost->featured_image_url" class="h-[560px] w-full bg-cover rounded-lg"/>

    @if($blogPost->featured_image_hover_url != '')   
        <x-background-hover-transition :image="$blogPost->featured_image_hover_url" class="h-[560px] w-full bg-cover rounded-lg" />
    @endif

    <div class="absolute top-0 left-0 z-10 w-full h-full">
        <div class="bg-black/50 h-full w-full p-3 md:p-10 rounded-lg">
            <div class="flex flex-col justify-between h-full">
                @include('components.posts-summary.featured-post-top-info')

                @include('components.posts-summary.featured-post-bottom-info')
            </div>
        </div>
    </div>
</div>

