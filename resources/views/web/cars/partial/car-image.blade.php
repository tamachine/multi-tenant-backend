<div class="hidden md:block w-fill-screen relative pt-48">
    <div class="absolute h-40 w-full bg-cars-image-pattern"></div>
    <img class="w-full Z-10" src="{{ asset('images/cars/image.png') }}" />    
</div>

<div 
    class="block md:hidden w-fill-screen h-[450px] mt-36" 
    style="
        background-image:url('{{ asset('images/cars/image.png') }}'); 
        background-position:center; background-size:cover;
        background-repeat: no-repeat
        "
    >
    <div class="h-40 w-full bg-cars-image-pattern-mobile"></div>
</div>