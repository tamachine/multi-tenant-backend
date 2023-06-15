<div class="
        flex items-center md:items-stretch gap-1
        h-full w-max
        md:border-0 border border-gray-secondary rounded-xl
        p-3 md:p-0
        "
    >

    <div class="md:hidden">
        <img src="{{ $reviewInfoComponent->getMobileIconPath() }}" />
    </div>

    <div class="flex flex-col md:items-center ">
        <div class="text-black-primary">
            <span class="text-pink-red text-[26px] md:text-3xl font-fredoka-bold leading-mini">{{ $reviewInfoComponent->getNote() }}</span>
            <span class="md:text-2xl text-lg font-fredoka leading-mini">{{ __('reviews.of') }} {{ $reviewInfoComponent->getMaxNote() }}</span>
        </div>
        <div class="hidden md:inline-block mb-1">
            @for($x=1; $x<=$reviewInfoComponent->getTotalStars(); $x++)
                @if($x<=$reviewInfoComponent->getMarkedStars())
                    <i class="fa-solid fa-star text-amber-400"></i>
                @else
                    <i class="fa-regular fa-star text-amber-400"></i>
                @endif
            @endfor
        </div>
        <div class="hidden md:inline-block mt-auto mb-1"><img src="{{ $reviewInfoComponent->getIconPath() }}" /></div>
        <div class="mt-auto font-sans-medium md:font-sans leading-mini">{{ $reviewInfoComponent->getTotalReviews() }} {{ __('reviews.reviews') }}</div>
    </div>
</div>

