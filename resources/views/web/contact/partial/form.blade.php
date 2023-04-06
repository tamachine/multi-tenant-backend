<div class="flex flex-col md:flex-row mt-8 md:mt-28 gap-8 md:gap-11">
    <div class="px-12 md:px-0 w-80">
        {!! webpImage("images/contact/contact-top.jpg", 'object-cover h-full rounded-xl') !!}
    </div>
    <div class="flex-grow">
        <livewire:web.contact-form  :submitButtonCentered="false" />
    </div>
</div>