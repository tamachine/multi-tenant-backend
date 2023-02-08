<div 
    x-cloak
    x-show="!show"
    class="        
    md:hidden fixed w-screen top-[60px] left-0 h-[calc(100vh_-_20px)] 
    z-20 overflow-hidden
    bg-black text-white opacity-70
    p-8
    "
    >

    <x-wire-spinner /> 
    <div
        wire:loading.remove
        >
        <div>{{ $extraPopup->name }}</div>
        <img src="{{ $extraPopup->image_url }}" />
        <div>{{ $extraPopup->description }}</div>

        <div
        x-on:click="close()"
        >
            <img src="{{ asset('images/icons/close.svg') }}" />
        </div>
    </div>
</div>