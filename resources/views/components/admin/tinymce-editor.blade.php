<div x-data="{ value: @entangle($attributes->wire('model')) }" x-init="tinymce.init({
    target: $refs.tinymce,
    themes: 'modern',
    height: '{{ $height ?? "200px" }}',
    menubar: false,
    plugins: 'anchor autolink charmap code codesample image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat code',
    link_rel_list: [
        { title: 'none', value: '' },
        { title: 'noreferrer', value: 'noreferrer' },
        { title: 'nofollow', value: 'nofollow' },
        { title: 'noreferrer nofollow', value: 'noreferrer nofollow' }
    ],
    setup: function(editor) {
        editor.on('blur', function(e) {
            value = editor.getContent()
        })

        editor.on('init', function(e) {
            if (value != null) {
                editor.setContent(value)
            }
        })

        function putCursorToEnd() {
            editor.selection.select(editor.getBody(), true);
            editor.selection.collapse(false);
        }

        $watch('value', function(newValue) {
            if (newValue !== editor.getContent()) {
                editor.resetContent(newValue || '');
                putCursorToEnd();
            }
        });
    }
})" wire:ignore>
    <div>
        <input x-ref="tinymce" type="textarea" {{ $attributes->whereDoesntStartWith('wire:model') }}>
    </div>
    <div class="italic">
        <span class="font-medium text-sm text-red-500 mb-3">Rich text editor notes:</span>
        <ul class="text-sm list-disc list-inside text-slate-900">
            <li>Data is not stored in database until the 'Save' button below is pressed.</li>
            <li>Use the code option (<>) to embed external code like instagram posts.</li>    
        </ul>
    </div>

</div>

