<div
    class="items-center relative"
    x-data="selectable({ data: {{ json_encode($selectableComponent->getItems()) }}, value: '{{ $selectedValue }}' })"
    x-init="init()"
    >
    <div class="absolute bottom-11 flex justify-center w-full z-30 bg-white rounded-xl">
        <div
            class="relative w-fit rounded-xl shadow-t-md font-medium text-right"
            x-show="openDropdown"
            x-cloak
            >
            <div class="absolute top-0 h-10 w-full bg-gradient-to-b from-white via-white z-10 rounded-xl"></div>
            <div
                class="max-h-80 overflow-scroll scrollbar-none w-fit px-5"
                >
                <ul class="py-5" x-ref="listbox">
                    <template x-for="(key, index) in Object.keys(options)" :key="index">
                        <li
                            :id="name + 'Option' + focusedOptionIndex"
                            @click="selectOption()"
                            @mouseenter="focusedOptionIndex = index"
                            @mouseleave="focusedOptionIndex = null"
                            role="option"
                            :aria-selected="focusedOptionIndex === index"
                            :class="{ 'text-pink-red': index === focusedOptionIndex, 'text-black-primary': index !== focusedOptionIndex }"
                            class="py-2 hover:text-pink-red cursor-pointer"
                            x-text="Object.values(options)[index]"
                            >
                        </li>
                    </template>
                </ul>
            </div>
            <div class="absolute bottom-0 h-10 w-full bg-gradient-to-t from-white via-white z-10 rounded-xl"></div>
        </div>
    </div>
    <input type="text" class="hidden" value="{{ $selectedValue }}" x-ref="inputSelectedValue" id="inputSelectedValue"/>
    <div
        x-on:click="toggleListboxVisibility()"
        x-on:click.away="openDropdown = false"
        :aria-expanded="openDropdown"
        aria-haspopup="listbox"
        type="text"
        class="
            rounded-md border-1 border-gray-tertiary
            text-xl text-center
            focus:outline-none focus:ring-0 focus:border-gray-tertiary
            h-11
            w-fit
            px-6
            cursor-pointer"
        x-ref="showSelectedOption"
        >    {{ $selectedText }}
    </div>
</div>
