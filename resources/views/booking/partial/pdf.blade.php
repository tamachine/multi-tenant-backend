<x-admin.form-section submit="pdfBooking">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
            <div class="mx-auto mt-4 md:mt-0 text-center">
                <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-green-900 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    wire:click="createPdf"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    Re-create PDF
                </button>
            </div>

        @if ($pdf_path)
            <div class="mx-auto mt-4 md:mt-0 text-center">
                <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-green-900 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    wire:click="viewPdf"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>

                    View PDF
                </button>
            </div>

            <div class="mx-auto mt-4 md:mt-0 text-center">
                <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-green-900 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    wire:click="sendPdf"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>

                    Send PDF
                </button>

                <div class="text-xs mt-2 mx-auto">
                    It will be sent to <strong>{{$booking->email}}</strong>
                    <br>
                    <a href="javascript:void(0);"
                        class="mt-1 text-xs text-purple-700 hover:underline"
                        @click.prevent="tab='customer'"
                    >Click here</a> to change that email.
                </div>
            </div>
        @endif
    </x-slot>
</x-admin.form-section>
