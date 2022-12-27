<div class="grid grid-cols-[repeat(auto-fill,350px)] md:grid-cols-[repeat(auto-fill,324px)] gap-x-5 gap-y-8 md:gap-y-10 justify-center">
    @foreach(App\Models\Car::all() as $car)
        <x-car-card :car="$car" />
    @endforeach
</div>