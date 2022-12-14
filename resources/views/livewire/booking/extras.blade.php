<div>
    @include('booking.partial.extras')

    @if (count($availableExtras))
        <div class="mt-10">
            @include('booking.partial.add-extras', [
                'formTitle'         => __('Add extras'),
                'formDescription'   => __('Click on the extras you want to add, select the quantity and click on "Save Extras"'),
                'formButton'        => __('Save Extras'),
            ])
        </div>
    @endif
</div>
