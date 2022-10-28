<div class="flex flex-col items-center h-full">
    <div class="text-black-primary text-lg">
        <span class="font-fredokaOne text-pink-red text-3xl">{{ $reviewInfoComponent->getNote() }}</span> {{ __('web.reviews.of') }} {{ $reviewInfoComponent->getMaxNote() }}</div>
    <div> 
        @for($x=1; $x<=$reviewInfoComponent->getTotalStars(); $x++)     
            @if($x<=$reviewInfoComponent->getMarkedStars())                   
                <i class="fa-solid fa-star text-amber-400"></i>
            @else
                <i class="fa-regular fa-star text-amber-400"></i>
            @endif                       
        @endfor
    </div>
    <div class="mt-auto"><img src="{{ $reviewInfoComponent->getIconPath() }}" /></div>
    <div class="mt-auto">{{ $reviewInfoComponent->getTotalReviews() }} {{ __('web.reviews.reviews') }}</div>    
</div>