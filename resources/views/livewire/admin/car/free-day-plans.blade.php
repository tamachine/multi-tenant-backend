<div>
    @include('livewire.admin.car.partial.free-day-plans')

    @if (count($availablePlans))
        <div class="mt-10">
            @include('livewire.admin.car.partial.add-free-day-plans', [
                'formTitle'         => __('Add free day plans'),
                'formDescription'   => __('Add available free day plans (one by one or all of them)'),
            ])
        </div>
    @endif
</div>
