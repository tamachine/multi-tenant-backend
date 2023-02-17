@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-sans-medium text-base text-[#AAAAAA]']) }}>
    {{ $value ?? $slot }}
</label>
