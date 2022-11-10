<div
    x-data="{ openDelete: false }"
    x-on:close-modal.window="openDelete = false"
    x-cloak
>
    <button
        x-on:click="openDelete = true"
        class="{{ isset($class) ? $class : ''}}"
    >{{ $trigger }}</button>

    <div
        class="modal"
        x-show="openDelete"
        x-on:click.away="openDelete = false"
    >
        <div class="modal-overlay"></div>

        <div class="modal-container">
            <div class="modal-content">
                <div class="modal-heading">
                    <h1>{{ isset($title) ? $title : 'Delete'}}</h1>

                    <div class="modal-close cursor-pointer z-50 block" x-on:click="openDelete = false">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <div class="modal-body">
                    @if (isset($body))
                        {!! $body !!}
                    @else
                        Are you sure that you want to delete {{ $name }}?
                    @endif
                </div>

                <div class="modal-footer">
                    @if (isset($footer))
                        {!! $footer !!}
                    @else
                        <button
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                            x-on:click="$dispatch('delete-element', { hashid: '{{ $hashid }}' })"
                            wire:loading.attr="disabled"
                        >Delete</button>

                        <button class="ml-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ks-green"
                            x-on:click="openDelete = false">
                            Cancel
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

