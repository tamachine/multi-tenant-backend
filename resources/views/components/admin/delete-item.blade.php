<div
    x-data="{ openDelete: false }"
    x-on:close-modal.window="openDelete = false"
    x-cloak
>
    <button
        type="button"
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
                            type="button"
                            class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                            x-on:click="$dispatch('{{isset($event) ? $event : 'delete-element'}}', { hashid: '{{ $hashid }}' }); openDelete = false"
                            wire:loading.attr="disabled"                            
                        >
                            @if (isset($button))
                                {!! $button !!}
                            @else
                                Delete
                            @endif
                        </button>

                        <button
                            type="button"
                            class="ml-3 inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-gray-700 hover:text-gray-700 active:bg-white active:border-gray-700 active:text-gray-700 disabled:opacity-25 transition ease-in-out duration-150"
                            x-on:click="openDelete = false">
                            Cancel
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>    
</div>


