<div class="p-4 sm:p-10">
    <x-admin.form-section submit="update"  formClass="block">
        <x-slot name="title">
            {{ __('Edit FAQ Category') }}
        </x-slot>

        <x-slot name="description">
            {{ $faqCategory->name }}
        </x-slot>

        @include('livewire.content.faq-category.partial.form', ['faqCategory' => $faqCategory])

        <x-slot name="actions">
            <x-admin.button wire:loading.attr="disabled">
                {{ __('Update FAQ Category') }}
            </x-admin.button>
        </x-slot>
    </x-admin.form-section>

    <div class="mt-10">
        <x-admin.form-section submit="render">
            <x-slot name="title">
                {{ __('Delete FAQ Category') }}
            </x-slot>

            <x-slot name="description">
                @if($faqCategory->canBeDeleted())
                    {{ __('Click on the button to delete this FAQ Category') }}
                @else                    
                    {{ __('Can not be deleted because only this one is left') }}                    
                @endif
            </x-slot>

            <x-slot name="form">
            </x-slot>

            @if($faqCategory->canBeDeleted())
            <x-slot name="actions">
                <x-admin.delete-item
                    trigger="Delete FAQ Category"
                    title="Delete FAQ Category"
                    class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                    name="{{ $faqCategory->name }}"
                    hashid="{{ $faqCategory->hashid }}"
                />
            </x-slot>
            @endif
        </x-admin.form-section>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-element', event => {
            @this.call('delete')
        });
    </script>
@endpush
