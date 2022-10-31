{{-- 
    background-image url is set with the 'style' property because Tailwind does not allow arbitrary values to be computed from dynamic values:
    https://v2.tailwindcss.com/docs/just-in-time-mode
--}}

<div class="flex flex-col bg-cover rounded-3xl px-6 text-white justify-between" style="background-image:url('{{ $backgroundRelativePath }}')">    
    <div class="my-8 bg-white rounded-2xl py-1 px-[10px] w-fit">
        <img class="inline" src="{{ asset('images/icons/clock.svg') }}" /> 
        <span class="text-sm font-medium text-black-primary pl-1">{{ $time }}</span>
    </div>
    <div class="pt-[212px] font-fredokaOne text-[32px] font-semibold">{{ $title }}</div>
    <div class="pb-9">{{ $text }}</div>
</div>