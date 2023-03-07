<div class="mt-16 max-w-5xl mx-8 lg:mx-auto md:flex md:gap-4">
    <div class="bg-[#fdeef4] rounded-xl p-10 flex-1 md:overflow-auto md:max-h-full tiny-content">
        <h2 class="text-4xl">{!! __('about.our-past') !!}</h2>
        <h2 class="text-4xl">{!! __('about.our-present') !!}</h2>
        <h2 class="text-4xl">{!! __('about.our-future') !!}</h2>

        <p class="mt-4">
            {!! __('about.our-text') !!}
        </p>
    </div>

    <div class="xl:w-1/2 mt-8 md:mt-0 sm:flex sm:flex-col gap-4 sm:flex-1">
        {!! webpImage("images/about/about-our-1.png", "object-cover rounded-xl") !!}
        <div class="mt-4 md:mt-0 grid grid-cols-2 gap-4">
            {!! webpImage("images/about/about-our-2.png", "object-cover rounded-xl w-full") !!}
            {!! webpImage("images/about/about-our-3.png", "object-cover rounded-xl w-full") !!}
        </div>
    </div>
</div>
