<div class="relative text-pink-red bg-white landscape:md:h-[86vh] portrait:md:h-[75vh] w-fill-screen">
   <div class="relative z-[1]">
      <h1 class="p-11 pb-5 md:py-3 text-[2.75rem] md:text-[3.5rem] lg:text-[4.5rem]">{!! __('home.title') !!}</h1>
      <h3 class="text-base md:text-xl">{!! __('home.subtitle') !!}</h3>
   </div>

   {{-- SEARCHBAR --}}
   <div class="searcher relative md:absolute md:bottom-[-20px] w-full mt-10 md:mt-0 z-30">
      <x-car-search-bar />
   </div>
   
   {{-- BACKGROUND IMAGE --}}
   <div class="image-wrapper relative md:absolute md:top-0 md:left-0 w-full md:h-full z-0 mt-[-50px]
   before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-2/6 before:bg-gradient-to-b before:from-white before:to-transparent">
      <x-image path="images/home/rent-car-reykjavik.jpg" class="hidden md:inline-block" />
      <x-image path="images/home/rent-car-reykjavik-mb.jpg" class="md:hidden" />
   </div>
</div>
