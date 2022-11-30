@if($textDirection == 'center')
<div class="text-center">
@elseif($textDirection == 'right')
<div class="text-right">
@else
<div class="text-left">
@endif
    <h2 class="{{ $mobileSmall ? 'text-[42px]' : '' }}">
        {{ $title }}
    </h2>
@if($paddingTop == '5')
    <h4 class="pt-5 {{ $mobileSmall ? 'text-lg' : '' }}">
@else
    <h4 class="pt-2 {{ $mobileSmall ? 'text-lg' : '' }}">
@endif    
        {{ $subtitle }}
    </h4>
</div>
