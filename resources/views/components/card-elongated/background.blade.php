{{-- 
    background-image url is set with the 'style' property because Tailwind does not allow arbitrary values to be computed from dynamic values:
    https://v2.tailwindcss.com/docs/just-in-time-mode
--}}

<div 
    class="absolute top-0 left-0 bottom-0 z-0 h-[495px] w-full bg-cover rounded-2xl"
    style="background-image: linear-gradient(30.78deg, rgb(255, 10, 84, 0.3) -37.85%, rgba(0, 0, 0, 0) 68.21%), url('{{ $image }}')"

    x-show="image == '{{ $image }}'" 

    x-transition:enter="transition ease-out duration-500" 
    x-transition:enter-start="opacity-0" 
    x-transition:enter-end="opacity-100" 
    x-transition:leave="transition ease-in duration-500" 
    x-transition:leave-start="opacity-100" 
    x-transition:leave-end="opacity-0"
></div>