<section id="about" class="sm:flex gap-10 my-28 md:my-36">
    <div class="about__image sm:w-[50%] lg:w-[44%] rounded-2xl order-1 image-wrapper">
        <x-image path="images/landing-cars/about-car-renting.jpg" />
    </div>
    <div class="about__content sm:w-[50%] lg:w-[56%] my-5">
        <x-read-more-block text="{!! __('landing-cars.about-text') !!}" image-path="/images/icons/arrow-down-solid.svg"/>
        {{-- NOTA: Por el momento dejamos el botón comentado porque no hay página a la que ir --}}
        <a class="btn-border hidden" href="">{{ __('landing-cars.about-button') }}</a>
    </div>
</section>