<input {{ $attributes->has('disabled') && $attributes->get('disabled') ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-purple-700 focus:ring focus:ring-purple-700 focus:ring-opacity-50 placeholder-gray-400 disabled:opacity-25']) !!}
>
