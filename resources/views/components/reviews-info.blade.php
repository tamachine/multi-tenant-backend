<div class="
        flex items-center gap-1
        h-fit w-max
        md:border-0 border border-[#E7ECF3] rounded-xl
        md:p-0 px-3 py-2
        "
    >

    <div class="md:hidden">
        <img src="{{ $reviewInfoComponent->getMobileIconPath() }}" />
    </div>

    <div class="flex flex-col items-center ">
        <div class="text-black-primary">
            <span class="text-pink-red text-2xl md:text-3xl font-fredoka-bold">{{ $reviewInfoComponent->getNote() }}</span>
            <span class="md:text-2xl text-lg font-fredoka">{{ __('reviews.of') }} {{ $reviewInfoComponent->getMaxNote() }}</span>
        </div>
        <div class="hidden md:inline-block">
            @for($x=1; $x<=$reviewInfoComponent->getTotalStars(); $x++)
                @if($x<=$reviewInfoComponent->getMarkedStars())
                    <i class="fa-solid fa-star text-amber-400"></i>
                @else
                    <i class="fa-regular fa-star text-amber-400"></i>
                @endif
            @endfor
        </div>
        <div class="hidden md:inline-block mt-auto"><img src="{{ $reviewInfoComponent->getIconPath() }}" /></div>
        <div class="mt-auto md:font-normal md:font-sans font-sans-medium font-medium">{{ $reviewInfoComponent->getTotalReviews() }} {{ __('reviews.reviews') }}</div>
    </div>
</div>

