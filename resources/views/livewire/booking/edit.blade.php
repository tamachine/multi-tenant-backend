<div>
    @include('livewire.booking.partial.edit', [
        'formTitle'         => __('Edit Booking'),
        'formDescription'   => __('Edit the basic booking information and then click on "Save Info"'),
        'formButton'        => __('Save Info'),
    ])

    <div class="mt-10">
        @include('livewire.booking.partial.pdf', [
            'formTitle'         => __('Booking PDF'),
            'formDescription'   => __('You can re-create or view the PDF for this booking and then send it to the client'),
        ])
    </div>
</div>
