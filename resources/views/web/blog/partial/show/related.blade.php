@if ($related) 
    <section>
        <h2 class="font-fredoka-semibold text-5xl text-pink-red text-left">{{ __('blog.related-posts-title') }}</h2>
        <div class="font-sans text-2xl text-left pb-7 md:pb-16">{{ __('blog.related-posts-subtitle') }}</div>
        <div class="grid grid-rows-1 md:grid-cols-3 gap-10">
            @foreach($related as $blogPost)            
            <div class="rounded-2xl bg-cover h-[490px] w-full p-6 flex flex-col justify-end items-start text-white bg-slate-500" style="background-image: url('{{ $blogPost->featured_image_url }}')">
                <div class="font-fredoka-semibold text-3xl">{{ $blogPost->title }}</div>
                <div class="font-sans-medium md:text-base text-lg">{{ $blogPost->summary }}</div>
            </div>
            @endforeach
        </div>
    </section>
@endif