<div 
    x-data="plusMinusInput()"
    class="
        bg-[#B1B5C4] text-white 
        flex flex-row items-center justify-between
        gap-4 px-2 py-4
        text-[22px] 
        rounded-md
        h-8"
    >    
    <div>
        <div 
            x-on:click="minus()" 
            x-bind:disabled="minusDisabled"
            class="relative w-5 h-5 cursor-pointer"
            >
                <div class="
                    absolute
                    w-5
                    h-0
                    border-2
                    left-0
                    top-2
                    border-white" 
                ></div>
        </div>
    </div>
    
    <div x-text="number" class="w-5 text-center"></div>
    
    <div 
        x-on:click="plus()"
        class="relative w-5 h-5 cursor-pointer">
            <div class="
                absolute
                w-5
                h-0
                border-2
                left-0
                top-2
                border-white" 
            ></div>
            <div class="
                absolute
                w-0
                h-5
                border-2
                left-2
                top-0
                border-white" 
            ></div>
    </div>
    
</div>