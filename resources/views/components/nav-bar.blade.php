<nav class="flex items-center justify-between flex-wrap px-20 py-5 bg-white">
  <div class="font-fredokaOne text-pink-red font-normal text-3xl leading-9">{{ __('web.general.brand') }}</div>
  <div class="flex items-center divide-x gap-10">
    <div class="flex items-end justify-between flex-wrap gap-10 text-lg">
      <a href="#">{{ __('web.navbar.cars') }}</a>
      <a href="#">{{ __('web.navbar.about') }}</a>
      <a href="#">{{ __('web.navbar.faq') }}</a>
      <a href="#">{{ __('web.navbar.blog') }}</a>
      <a href="#">{{ __('web.navbar.contact') }}</a>
    </div>
    <div class="pl-5 text-sm flex items-center gap-1">
      <span>{{ __("web.navbar." . App::currentLocale()) }}</span>
      <img class="inline" src='{{ URL::asset("/images/flags/".App::currentLocale().".svg") }}' />
    </div>
  </div>
</nav>