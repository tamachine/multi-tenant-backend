<div 
    class="
        flex md:justify-center items-center md:gap-9 gap-2
        flex-nowrap md:flex-wrap
        overflow-x-auto md-max:scrollbar-none
        md:py-24 py-0 font-sans-medium"
    >
@foreach($carCategories as $carCategory)
    <div class="bg-white rounded-md cursor-pointer group">
        <div class="flex flex-col items-center m-[2px]">
            <div 
                class="bg-[#F2F2F2]  w-44 h-24 rounded-t-md flex justify-center 
                transition ease-in-out group-hover:bg-pink-red-secondary duration-300"
                >
                <img class="py-5 " src="{{ $carCategory->imagePath }}" />
            </div>
            <div 
                class="
                py-2 w-full text-center rounded-b
                transition ease-in-out group-hover:bg-pink-red group-hover:text-white duration-300"                
                >
                {{ $carCategory->text }}
            </div>
        </div>        
    </div>
@endforeach
</div>