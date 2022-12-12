<div x-data="{ open: false }" class="w-full">
    <div @click.prevent="open = ! open" class="flex text-xl gap-6 items-center" :class="{ 'text-pink-red text-[22px]': open }">
        <span class="font-sans-medium">{{ $question }}</span>
        <div class="ml-auto cursor-pointer">
            <i class="fa fa-minus" x-show="open"></i>
            <i class="fa fa-plus"  x-show="! open"></i>
        </div> 
    </div>
    <div x-show="open" class="pt-6 md:pt-9 font-sans">{{ $answer }}</div>
</div>