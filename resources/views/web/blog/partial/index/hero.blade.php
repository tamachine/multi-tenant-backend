<div class="w-fill-screen text-white relative">
    <div class="absolute top-0 left-0 z-10 w-full">
        <div class="max-w-7xl mx-auto">
            <div class="px-3 md:px-0 max-w-6xl mx-auto">
                <div class="flex justify-between">
                    <div>
                        <x-breadcrumb :breadcrumbs="$breadcrumbs" light-colors="{{ $hero->count() > 0 }}"/>
                    </div>
                    <div class="hidden md:block">
                        <div class="text-right py-7 text-sm">
                            {!! __('blog.by') !!} <a href="#" id="hero-blog-author" class="transition ease-in-out duration-200"> {!! $hero->first()?->author->name !!} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 z-10 w-full">
        <div class="max-w-7xl mx-auto">            
            <div class="px-3 md:px-0 max-w-6xl mx-auto flex flex-row items-center">
                <div class="basis-1/2">
                    <button id="hero-blog-link" class="rounded-lg bg-white font-sans-medium text-pink-red px-7 py-2 cursor-pointer" onclick="window.location.href='{!! $hero->first()?->url !!}'">{!! __('blog.read-more') !!}</button>
                </div>
                <div class="basis-1/2 flex justify-end gap-2 py-10 md:py-[75px] hero-blog-pagination"></div>
            </div>
        </div>
    </div>
    
    <swiper-container
        init="false"
        id="hero-blog"
    >
    @foreach($hero as $post)
        <swiper-slide
            data-author="{!! $post->author->name !!}"
            data-url="{{ $post->url }}"
        >
            <div class="hidden md:block absolute top-0 left-0 w-full z-20">
                <div class="max-w-7xl mx-auto">
                    <div class="max-w-6xl mx-auto text-right py-7 text-sm swiper-no-swiping">
                        {{ __('blog.by') }} <a href="#"> {!! $post->author->name !!} </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-4 h-[540px] md:h-[670px]">
                <div
                    class="w-full h-full bg-cover"
                    style="background-image: url('{{ $post->featured_image_url }}')"
                >
                    <div class="bg-black/50 h-full w-full">
                        <div class="max-w-7xl mx-auto h-full">
                            <div class="px-3 md:px-0 max-w-6xl mx-auto h-full pb-[50px]">
                                <div class="flex flex-col justify-end h-full py-10 md:py-[75px] gap-2 md:gap-5 md:max-w-[710px]">

                                    <div class="font-fredoka-semibold text-[40px] md:text-[64px] text-left swiper-no-swiping">
                                        {!! $post->title !!}
                                    </div>

                                    <div class="font-sans text-xs md:hidden swiper-no-swiping">
                                        {{ __('blog.by') }} <a href="#"> {!! $post->author->name !!} </a>
                                    </div>

                                    <div class="font-sans-medium swiper-no-swiping">
                                        {!! $post->summary !!}
                                    </div>
                                    <div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
            
        </swiper-slide>
    @endforeach
    </swiper-container>
</div>

@push('scripts')
    <script>
        initSwiper(
            '#hero-blog', 
            {
                pagination: {
                    el: '.hero-blog-pagination',
                    clickable: true,
                    bulletActiveClass: "hero-blog-bullet-active",
                    bulletClass: 'hero-blog-bullet',
                    renderBullet: function (index, className) {
                        if(this.slides.length > 1) {
                            return '<span class="' + className + '">' + (index + 1) + "</span>";
                        } else {
                            return '';
                        }
                    }
                },
                slidesPerView: 1,
                gridRows: 1,
                loop: true,
                mousewheelForceToAxis: true,
                on: {
                    slideChange() {
                        let author = this.slides[this.realIndex].dataset.author;
                        let url = this.slides[this.realIndex].dataset.url;
                        
                        document.querySelector('#hero-blog-author').innerHTML = author;
                        document.querySelector('#hero-blog-link').onclick = function() { window.location.href=url; }
                       
                    },
                },
            }
        );
    </script>
@endpush