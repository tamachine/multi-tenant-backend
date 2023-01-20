<div class="flex gap-2">   
    @foreach($steps as $index => $item)
        <div 
            class="
                font-sans-medium
                text-xs                
                border border-black
                rounded-full
                flex
                items-center
                justify-center
                {{ $index <= $active ? 'bg-black text-white' : 'bg-white'}}
                {{ $index == $active ? 'px-2' : 'w-5 h-5' }}
                ">
            {{ $index }}
            @if($active == $index)
            . {{ $steps[$index] }}
            @endif            
        </div>
    @endforeach
</div>