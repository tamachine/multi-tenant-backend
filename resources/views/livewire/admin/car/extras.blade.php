<div>
    @include('admin.car.partial.extras')

    @if (count($availableExtras))
        <div class="mt-10">
            @include('admin.car.partial.add-extras', [
                'formTitle'         => __('Add extras'),
                'formDescription'   => __('Select the extras you want to add and click on "Save Extras"'),
                'formButton'        => __('Save Extras'),
            ])
        </div>
    @endif
</div>
