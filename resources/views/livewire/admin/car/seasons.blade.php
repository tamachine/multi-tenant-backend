<div>
    @include('admin.car.partial.seasons', [
        'formTitle'         => __('Edit season price plans'),
        'formDescription'   => __('Edit the price of this car in different seasons'),
    ])

    <div class="mt-10">
        @include('admin.car.partial.add-season', [
            'formTitle'         => __('Add season price plan'),
            'formDescription'   => __('Add a new season'),
            'formButton'        => __('Add season price plan'),
        ])
    </div>
</div>
