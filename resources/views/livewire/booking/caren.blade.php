@if (!$booking->caren_info)
    @if ($booking->caren_id)
        <div class="flex flex-col">
            <div class="bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                This booking was imnported from the previous app.

                <br><br>

                <button class="inline-flex items-center px-4 py-3 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-green-700 hover:text-green-700 active:bg-white active:border-green-700 active:text-green-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    wire:click="reloadCarenBooking"
                >
                    Get booking data from Caren
                </button>
            </div>
        </div>
    @else
        <div class="flex flex-col">
            <div class="bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                This booking has not been created in Caren yet.

                <br><br>

                <button class="inline-flex items-center px-4 py-3 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-green-700 hover:text-green-700 active:bg-white active:border-green-700 active:text-green-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    wire:click="createCarenBooking"
                >
                    Create booking in Caren
                </button>
            </div>
        </div>
    @endif
@else
    <div class="flex flex-col" x-data="{ info: '' }">
        <div class="flex justify-between bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <div class="text-lg">
                Status: <strong>{{ carenValue($caren_info, 'StatusText') }}</strong>
            </div>

            <div class="text-xs">
                <button class="inline-flex items-center px-4 py-3 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    wire:click="reloadCarenBooking"
                >
                    Sync booking data
                </button>
                <br>
                <span class="text-xs">
                    Sync our data with Caren
                </span>
            </div>

            @if (carenValue($caren_info, 'StatusText') != 'Cancelled')
                <x-admin.delete-item
                    trigger="Cancel booking in Caren"
                    title="Cancel booking in Caren"
                    class="inline-flex items-center px-4 py-3 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                    body="Are you sure that you want to cancel this booking in Caren?"
                    button="Cancel"
                    hashid=""
                    event="cancel-booking"
                />
            @endif
        </div>

        @include('livewire.booking.partial.caren-data', ['title' => 'Main Data', 'data' => 'main_data'])
        @include('livewire.booking.partial.caren-extras')
        @include('livewire.booking.partial.caren-insurances')
        @include('livewire.booking.partial.caren-data', ['title' => 'Other Data', 'data' => 'other_data'])
    </div>
@endif

@push('scripts')
    <script>
        window.addEventListener('cancel-booking', event => {
            @this.call('cancelCarenBooking')
        });
    </script>
@endpush
