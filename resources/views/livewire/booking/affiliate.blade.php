<div class="flex flex-col">
    <div class="bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        @if ($booking->affiliate)
            Current affiliate:
            <a href="{{route('intranet.booking.affiliate.edit', $booking->affiliate->hashid)}}"  target="_blank"
                class="text-purple-700 hover:underline"
            >
                {{ $booking->affiliate->name }}
            </a>
            <br>
            Affiliate commission: <strong>{{ formatPrice($booking->affiliate_commission, "ISK") }}</strong>

            <br><br>

            <x-admin.delete-item
                trigger="Delete"
                title="Delete affiliate"
                class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                name="{{ $booking->affiliate->name }} from this booking"
                hashid="{{ $booking->affiliate->name }}"
                event="delete-affiliate"
            />
        @else
            There is no affiliate linked to this booking.

            <br><br>

            <div class="flex items-center">
                <select id="affiliate" name="affiliate" wire:model="affiliate"
                    class="disable-arrow block w-auto h-10 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                >
                    <option value="">Select affiliate</option>
                    @foreach ($affiliates as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>

                <button class="inline-flex items-center ml-4 px-4 py-3 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-green-700 hover:text-green-700 active:bg-white active:border-green-700 active:text-green-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    wire:click="addAffiliate"
                >
                    Add affiliate
                </button>
            </div>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-affiliate', event => {
            @this.call('deleteAffiliate', event.detail.hashid)
        });
    </script>
@endpush
