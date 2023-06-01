@if($configurations)
    @if($configurations->nofollow && $configurations->noindex)
        <meta name="robots" content="nofollow, noindex">
    @elseif($configurations->nofollow)
        <meta name="robots" content="nofollow">
    @elseif($configurations->noindex)
        <meta name="robots" content="noindex">
    @endif    

    @if(!empty($configurations->meta_title))
        <title>{{ $configurations->meta_title }}</title>
    @else
        @include('layouts.partials.default-web-title')
    @endif

    @if(!empty($configurations->meta_description))
        <meta name="description" content="{!! $configurations->meta_description !!}">
    @endif   

    @if(!empty($configurations->canonical))
        <link rel="canonical" href="{!! $configurations->canonical !!}" />
    @endif
@else
    @include('layouts.partials.default-web-title')
@endif

