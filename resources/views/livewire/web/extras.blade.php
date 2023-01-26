<div class="flex">
    <div class="w-full flex flex-col gap-3 max-w-[780px]">
    @foreach($extras as $extra)
        <x-extra.extra :extra=$extra />       
    @endforeach    
    
        <x-wire-spinner /> 
    
        <div
        wire:loading.remove
        class="md:mx-auto my-8 grid {{ $showMoreButton ? 'grid-cols-2' : 'grid-cols-1' }}  md:flex gap-3 font-sans-medium md:text-xl text-lg">
            @if($showMoreButton)
            <button 
            wire:click="more"
                class="
                    rounded-lg border border-black     
                    px-3 py-4 md:px-[100px]                    
                    "
                >
               {{ __('extras.more') }}
            </button>
            @endif
            <button 
                class="
                    md:hidden 
                    rounded-lg bg-pink-red text-white
                    px-3 py-4                                       
                    ">
                {{ __('extras.continue') }}
            </button>
        </div>
    </div>
    <div class="md-max:hidden">
        summary
    </div>

    
</div>

