<input type="text"
    name="{{ $name }}"
    id="{{ $name }}"
    class="w-28 h-10 rounded-md shadow-sm border-gray-300 focus:border-blue-700 focus:ring focus:ring-blue-700 focus:ring-opacity-50 placeholder-gray-400 disabled:opacity-25"
    value="{{ old($name) }}"
    @if (isset($placeholder) && $placeholder) {!! 'placeholder="'.$placeholder.'"' !!} @endif
    @if (isset($autocomplete) && $autocomplete) {!! 'autocomplete="'.$autocomplete.'"' !!} @endif
    @if (isset($autofocus) && $autofocus) {!! 'autofocus' !!} @endif
    @if (isset($isWire) && $isWire) {!! 'wire:model.lazy="' . (isset($variable) ? $variable : $name) .'"' !!} @endif
>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Pikaday({
                field: document.getElementById('{{$name}}'),
                format: 'DD-MM-YYYY',
            });
        });
    </script>
@endpush
