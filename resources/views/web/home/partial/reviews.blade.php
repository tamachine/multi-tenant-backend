<div class="w-fill-screen md:left-0 md:w-full flex flex-nowrap md:flex-wrap justify-between gap-3 overflow-x-auto scrollbar-none px-3 md:px-0 pt-8 pb-14 md:pt-14 md:pb-36">
    <div class="flex justify-start pt-0 ">
        <x-reviews-info :reviewInfoComponent="$googleReviewInfoComponent" />
    </div>  
    <x-divide-custom />
    <div>
        <x-reviews-info :reviewInfoComponent="$facebookReviewInfoComponent" />
    </div>
    <x-divide-custom />
    <div>
        <x-reviews-info :reviewInfoComponent="$trustpilotReviewInfoComponent" />
    </div>
    <x-divide-custom />
    <div>
        <x-icon-text text="{!! __('reviews.award') !!}" icon-path="{{asset('images/icons/award.svg')}}" />
    </div>
    <x-divide-custom />
    <div class="pb-0 flex justify-end">
        <x-icon-text text="{!! __('reviews.24-support') !!}" icon-path="{{asset('images/icons/24hsupport.svg')}}" icon-classes="max-w-[46px] md:max-w-[62px] ml-4" />        
    </div>
</div> 