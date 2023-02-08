<div>
    @include('livewire.blog.category.partial.create-edit', [
        'formTitle'         => __('Edit category'),
        'formDescription'   => __('Edit the category and then click on "Save"'),
        'formButton'        => __('Save'),
    ])

    <div class="mt-10">
        <x-admin.form-section submit="render">
            <x-slot name="title">
                {{ __('Delete Category') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Click on the button to delete this category') }}
            </x-slot>

            <x-slot name="form">
            </x-slot>

            <x-slot name="actions">
                <x-admin.delete-item
                    trigger="Delete Category"
                    title="Delete Category"
                    class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                    name="{{ $category->name }}"
                    hashid="{{ $category->hashid }}"
                />
            </x-slot>
        </x-admin.form-section>
    </div>
</div>

@push('scripts')
<script>
    window.addEventListener('delete-element', event => {
        @this.call('deleteCategory')
    });
</script>
@endpush
