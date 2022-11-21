<div>
    @include('admin.car.partial.unavailability', [
        'formTitle'         => __('Unavailability'),
        'formDescription'   => __('Edit the date ranges when the car is not available'),
    ])

    <div class="mt-10">
        @include('admin.car.partial.add-unavailability-dates', [
            'formTitle'         => __('Add dates'),
            'formDescription'   => __('Add a new date range when the car is not available'),
            'formButton'        => __('Save dates'),
        ])
    </div>
</div>
