<div class="text-white font-sans flex flex-col gap-6">
    <div class="flex flex-col md:flex-col-reverse gap-2">
        <div class="font-fredoka-semibold text-4xl md:text-[40px]">
            {!! $blogPost->title !!}
        </div>

        <div class="text-xs md:text-base">
            By <a href="#"> {!! $blogPost->author->name !!} </a>
        </div>
    </div>
    <div class="font-sans-medium">
        {!! $blogPost->summary !!}
    </div>
    <div>
        <button class="rounded-lg bg-white md:bg-black font-sans-medium text-pink-red md:text-white px-7 py-2">Read more</button>
    </div>
</div>