<div class="grid grid-cols-4  gap-5 justify-center">
    @foreach(App\Models\Car::all() as $car)
        <x-car-card :car="$car" />
    @endforeach
</div>