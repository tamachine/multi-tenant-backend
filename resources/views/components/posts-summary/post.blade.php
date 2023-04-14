<div class="flex flex-col gap-4">
    <div
        x-data="{ image: '{{ $blogPost->featured_image_url }}' }"
        x-on:mouseenter="image= '{{ $blogPost->featured_image_hover_url != '' ? $blogPost->featured_image_hover_url : $blogPost->featured_image_url }}'"
        x-on:mouseleave="image= '{{ $blogPost->featured_image_url }}'"  
        class="h-[260px] rounded-lg bg-cover relative"    
    >

        <x-background-hover-transition :image="$blogPost->featured_image_url" class="h-[260px] w-full bg-cover rounded-lg" />

        @if($blogPost->featured_image_hover_url != '')           
            <x-background-hover-transition :image="$blogPost->featured_image_hover_url" class="h-[260px] w-full bg-cover rounded-lg" />
        @endif
        
        <div class="absolute top-0 left-0 z-10 w-full h-full">
            <div class="bg-black/50 h-full w-full p-3 md:p-5 rounded-lg">
                <div class="flex flex-col justify-end items-start h-full">
                    <x-reading-time-icon time="{{ __('blog.time') }}" />
                </div>
            </div>
        </div>
       
    </div>

    <div class="font-fredoka-semibold text-[22px] md:text-2xl text-left">
        <a href="{{ $blogPost->url }}">{!! $blogPost->title !!}</a>
    </div>

    <div class="flex flex-col gap-2">
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
