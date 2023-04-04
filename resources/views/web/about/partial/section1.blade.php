<div class="grid md:grid-cols-2 grid-cols-1 gap-4 mt-12">
    <div class="bg-pink-red-secondary rounded-xl p-7 md:p-10 font-fredoka-semibold">
        <h2 class="text-2xl md:text-4xl">{!! __('about.our-past') !!}</h2>
        <h2 class="text-2xl md:text-4xl">{!! __('about.our-present') !!}</h2>
        <h2 class="text-2xl md:text-4xl">{!! __('about.our-future') !!}</h2>

        <p class="md:mt-6 mt-2 font-sans text-sm md:text-base">
            {!! __('about.our-text') !!}
        </p>
    </div>

    <div class="flex flex-col w-full h-full gap-3">
        <div>
            {!! webpImage("images/about/about-our-1.png", "object-cover rounded-xl w-full") !!}
        </div>
        <div>
            <div class="grid grid-cols-2 w-full gap-4 justify-between">                
                {!! webpImage("images/about/about-our-2.png", "object-cover rounded-xl w-full") !!}
                {!! webpImage("images/about/about-our-3.png", "object-cover rounded-xl w-full") !!}                
            </div>
        </div>
    </div>
</div>
