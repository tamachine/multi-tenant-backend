<div class="grid grid-cols-4 gap-x-5 gap-y-10 justify-center">
    @foreach(App\Models\Car::all() as $car)
        <x-car-card :car="$car" />
    @endforeach
</div>