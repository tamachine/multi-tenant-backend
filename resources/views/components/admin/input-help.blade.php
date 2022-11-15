@props(['value'])

<label {{ $attributes->merge(['class' => 'mt-2 text-xs text-gray-600']) }}>
    {{ $value ?? $slot }}
</label>
