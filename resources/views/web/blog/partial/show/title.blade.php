<div class="py-8 md:pt-16 flex flex-col gap-4 md:gap-8 justify-center items-center text-center">
    <div class="text-black-primary font-fredoka-semibold text-[40px] md:text-7xl" >{{ $post->title }}</div>
    <div class="text-[#9b9b9b]">
        {{ __('blog.by') }} <a href="#" class="text-black underline"> {!! $post->author->name !!} </a> {{ __('blog.in') }} <a href="#"> {!! $post->category->name !!} </a>
    </div>
</div>