{{-- desktop --}}
<div class="hidden md:grid py-24 grid-cols-9">
    <div class="pt-0 flex justify-start">
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
        <x-icon-text text="{{ trans('web.reviews.award') }}" icon-path="{{asset('images/icons/award.svg')}}" />
    </div>
    <x-divide-custom />
    <div class="pb-0 flex justify-end">
        <x-icon-text text="{{ trans('web.reviews.24-support') }}" icon-path="{{asset('images/icons/24hsupport.svg')}}" />        
    </div>
</div> 
{{-- desktop end --}}

{{-- mobile --}}

<div class="md:hidden flex flex-nowrap gap-3 overflow-x-auto scrollbar-none pt-10">
    <div>
        <x-reviews-info :reviewInfoComponent="$googleReviewInfoComponent" />
    </div>      
    <div>
        <x-reviews-info :reviewInfoComponent="$facebookReviewInfoComponent" />
    </div>    
    <div>
        <x-reviews-info :reviewInfoComponent="$trustpilotReviewInfoComponent" />
    </div>    
    <div>
        <x-icon-text text="{{ trans('web.reviews.award') }}" icon-path="{{asset('images/icons/award.svg')}}" />
    </div>    
    <div>
        <x-icon-text text="{{ trans('web.reviews.24-support') }}" icon-path="{{asset('images/icons/24hsupport.svg')}}" />        
    </div>
</div> 

{{-- mobile end --}}