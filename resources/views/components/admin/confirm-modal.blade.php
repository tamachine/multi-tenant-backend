<div
    x-show="openConfirm"
    x-on:click.away="openConfirm = false" 
    x-cloak
    >

    <div class="modal">
        <div class="modal-overlay"></div>

        <div class="modal-container">
            <div class="modal-content">
                <div class="modal-heading">
                    @if(isset($title))
                        <h1>{{ $title}}</h1>
                    @endif
                    
                    <div class="modal-close cursor-pointer z-50 block" x-on:click="openConfirm = false">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                @if (isset($body))
                <div class="modal-body">                
                    {!! $body !!}                              
                </div>
                @endif

                <div class="modal-footer">
                    @if (isset($footer))
                        {!! $footer !!}
                    @else
                        <div>
                            <button
                                type="button"
                                class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"                        
                                wire:click="{{ isset($wireConfirmAction) ? $wireConfirmAction : '' }}"
                                wire:loading.attr="disabled"
                                x-on:click="openConfirm = false"
                            >Confirm</button>

                            <button
                                type="button"
                                class="ml-3 inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-gray-700 hover:text-gray-700 active:bg-white active:border-gray-700 active:text-gray-700 disabled:opacity-25 transition ease-in-out duration-150"
                                x-on:click="openConfirm = false"
                                wire:click="{{ isset($wireCancelAction) ? $wireCancelAction : '' }}"
                                >
                                Cancel
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>