<div>
    @include('admin.car.partial.free-day-plans')

    @if (count($availablePlans))
        <div class="mt-10">
            @include('admin.car.partial.add-free-day-plans', [
                'formTitle'         => __('Add free day plans'),
                'formDescription'   => __('Add an available free day plans (one by one or all of them)'),
            ])
        </div>
    @endif
</div>
