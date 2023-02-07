<div>
    @include('livewire.blog.post.partial.create-edit', [
        'formTitle'         => __('Edit post'),
        'formDescription'   => __('Edit the post information and then click on "Save"'),
        'formButton'        => __('Save'),
    ])

    <div class="mt-10">
        <x-admin.form-section submit="render">
            <x-slot name="title">
                {{ __('Delete Post') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Click on the button to delete this post') }}
            </x-slot>

            <x-slot name="form">
            </x-slot>

            <x-slot name="actions">
                <x-admin.delete-item
                    trigger="Delete Post"
                    title="Delete Post"
                    class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                    name="{{ $post->name }}"
                    hashid="{{ $post->hashid }}"
                />
            </x-slot>
        </x-admin.form-section>
    </div>
</div>

@push('scripts')
<script>
    window.addEventListener('delete-element', event => {
        @this.call('deletePost')
    });
</script>
@endpush
