<div>
    @include('livewire.admin.vendor.partial.holidays', [
        'formTitle'         => __('Vendor\'s holidays'),
        'formDescription'   => __('Edit the days where the vendor is closed or it has a special schedule'),
    ])


    <div class="mt-10">
        @include('livewire.admin.vendor.partial.add-holidays', [
            'formTitle'         => __('Add holidays'),
            'formDescription'   => __('Add the day when the vendor is closed or it has a special schedule'),
            'formButton'        => __('Add holidays'),
        ])
    </div>
</div>
