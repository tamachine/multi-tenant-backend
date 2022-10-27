<div class="py-24 grid grid-cols-9 w-6xl mx-auto">
    <div class="pt-0">
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
        <x-icon-text text="Award" iconPath="{{asset('images/icons/award.svg')}}" />
    </div>
    <x-divide-custom />
    <div class="pb-0">
        <x-icon-text text="24h support" iconPath="{{asset('images/icons/24hsupport.svg')}}" />        
    </div>
</div> 