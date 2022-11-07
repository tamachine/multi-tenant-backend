<div x-data="{ open: false }" class="w-full font-medium">
    <div @click.prevent="open = ! open" class="flex text-xl" :class="{ 'text-pink-red text-[22px]': open }">
        <span>{{ $question }}</span>
        <div class="ml-auto cursor-pointer">
            <i class="fa fa-minus" x-show="open"></i>
            <i class="fa fa-plus"  x-show="! open"></i>
        </div> 
    </div>
    <div x-show="open" class="pt-9">{{ $answer }}</div>
</div>