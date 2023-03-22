<div
    class="h-[530px] md:h-[560px] w-full rounded-lg bg-cover"
    style="background-image: url('{{ $blogPost->featured_image_url }}')"
>
    <div class="bg-black/50 h-full w-full p-3 md:p-10 rounded-lg">
        <div class="flex flex-col justify-between h-full">
            @include('components.posts-summary.featured-post-top-info')

            @include('components.posts-summary.featured-post-bottom-info')
        </div>
    </div>
</div>