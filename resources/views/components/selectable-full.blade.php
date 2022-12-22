<div
    class="bg-white w-fit font-sans-medium text-black-secondary cursor-pointer"
    x-data="
        selectableFull( 
            { 
                value: '{{ $selectedItem->value }}', 
                title: '{!! $title !!}', 
                allValue: '{{ $allValue }}' 
            } 
        )"
    x-on:click="toggleVisibility()"
>
    <input type="text" x-model="value" class="hidden"/>
    <div class="relative">
        <div 
            class="flex justify-between gap-5 border-gray-secondary border p-3"
            :class="show ? 'rounded-t-lg' : 'rounded-lg'"
            >
            <div>
                <img src="{{ $iconPath }}" class="inline mr-1" />
                <button x-text="selectedTitle">{!! $title !!}</button>            
            </div>
            <div>
                <img src="{{ asset('images/icons/arrow-down.svg') }}" class="inline w-3" x-show="!show" />
                <img src="{{ asset('images/icons/arrow-up.svg') }}" class="inline w-3" x-cloak x-show="show"/>            
            </div>
        </div>
        <div
            class="absolute rounded-b-lg border-gray-secondary border border-t-0 w-full"
            x-cloak
            x-show="show"    
        >
            <ul class="divide-y">
                @foreach($items as $selectableFullItem)
                    <li 
                        x-on:click="clickItem({{ $selectableFullItem->toJson() }})"
                        class="py-2 pl-9"
                    >
                    {!! $selectableFullItem->text !!}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>