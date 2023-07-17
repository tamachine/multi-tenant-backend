<div 
    x-data="{ open: false }"     
    {{ $attributes->merge(['class' => 'w-full text-xl']) }}    
    >
    <div @click.prevent="open = ! open" class="flex {{ is_null($questionFontSizeClass) ? 'text-xl' : $questionFontSizeClass }} gap-6 items-center" :class="{ 'text-pink-red text-xl md:text-[22px]': open }">
        <span class="font-sans-medium font-medium">{{ $question }}</span>
        <div class="ml-auto cursor-pointer">
            <i x-cloak class="fa fa-minus" x-show="open"></i>
            <i class="fa fa-plus"  x-show="! open"></i>
        </div>
    </div>
    <div x-cloak x-show="open" class="pt-6 md:pt-9 font-sans {{ is_null($answerFontSizeClass) ? 'text-base' : $answerFontSizeClass }}">{{ $answer }}</div>
</div>
