@if($textDirection == 'center')
<div class="text-center">
@elseif($textDirection == 'right')
<div class="text-right">
@else
<div class="text-left">
@endif
    <h2 class="{{ $mobileSmall ? 'text-5xl' : '' }}">
        {{ $title }}
    </h2>
@if($paddingTop == '5')
    <h4 class="pt-5 max-w-[864px] {{ $textDirection == 'center' ? 'mx-auto' : '' }} {{ $mobileSmall ? 'text-2xl' : '' }}">
@else
    <h4 class="pt-2 max-w-[864px] {{ $textDirection == 'center' ? 'mx-auto' : '' }} {{ $mobileSmall ? 'text-2xl' : '' }}">
@endif    
        {{ $subtitle }}
    </h4>
</div>
