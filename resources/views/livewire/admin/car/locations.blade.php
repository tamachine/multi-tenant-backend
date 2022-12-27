<div>
    @include('livewire.admin.car.partial.locations', [
        'formTitle'         => __('Locations'),
        'formDescription'   => __('Edit this car\'s locations'),
    ])

    @if (count($availableLocations))
        <div class="mt-10">
            @include('livewire.admin.car.partial.add-location', [
                'formTitle'         => __('Add location'),
                'formDescription'   => __('Add a new location and its schedule for this car'),
                'formButton'        => __('Save location'),
            ])
        </div>
    @endif
</div>
