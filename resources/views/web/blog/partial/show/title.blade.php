<div class="py-8 md:pt-16 flex flex-col gap-4 md:gap-8 justify-center items-center text-center">
    <h1 class="text-black-primary" >{{ $post->title }}</h1>
    <div class="text-[#9b9b9b]">
        {{ __('blog.by') }} <a href="#" class="text-black underline"> {!! $post->author->name !!} </a> {{ __('blog.in') }} <a href="#"> {!! $post->category->name !!} </a>
    </div>
</div>