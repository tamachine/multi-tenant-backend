<div class="py-8 md:pt-16 flex flex-col gap-4 md:gap-8 justify-center items-center text-center">
    <div class="text-black-primary font-fredoka-semibold text-[40px] md:text-7xl" >{{ $post->title }}</div>
    <div class="text-[#9b9b9b]">
        <p>
            {{ __('blog.by') }} <a href="#" class="text-black"> {!! $post->author->name !!}</a>  {{ __('blog.in') }} <a href="#" class="text-black"> {!! $post->category->name !!} </a>
        </p>
        
        <p class="text-black mt-1">
            @if ($post->updated_at > $post->published_at)
                {{ $post->updated_at?->format('d / m / Y') }} <br>
            @else
                {{ $post->published_at?->format('d / m / Y') }}
            @endif
        </p>
    </div>
</div>