@foreach($crumbs as $text => $link)
    <a class="hover:underline" href="{{$link}}">{{$text}}</a> >
@endforeach
