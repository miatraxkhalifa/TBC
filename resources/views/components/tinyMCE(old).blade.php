<div
    x-data="{ value: @entangle($attributes->wire('model'))}"
    x-init="
        tinymce.init({
            target: $refs.tinymce,
            height: 400,
            menubar: true,
            invalid_elements : 'script,iframe,img, object',
            branding: false,
            plugins: [
                        'advlist autolink link lists charmap print hr',
                        'searchreplace fullscreen insertdatetime nonbreaking',
                        'emoticons paste help'
                ],
            toolbar: 'undo redo | formatselect |  ' +
                     'bold italic backcolor | alignleft aligncenter ' +
                     'alignright alignjustify | bullist numlist outdent indent | ' +
                     'removeformat | help',
            setup: function(editor) {
                editor.on('blur', function(e) {
                    value = editor.getContent()
                })

                editor.on('init', function (e) {
                    if (value != null) {
                        editor.setContent(value)
                    }
                })

                function putCursorToEnd() {
                    editor.selection.select(editor.getBody(), true);
                    editor.selection.collapse(false);
                }

                $watch('value', function (newValue) {
                    if (newValue !== editor.getContent()) {
                        editor.resetContent(newValue || '');
                        putCursorToEnd();
                    }
                });
            }
        })
    "
    wire:ignore
>
    <div>
        <input class="mt-32 block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:border-purple-400" rows="3" placeholder=".. just type something..."
            x-ref="tinymce"
            type="textarea"
            {{ $attributes->whereDoesntStartWith('wire:id') }}
            
        >

        
    </div>
</div>

@push('styles')
<script src="https://cdn.tiny.cloud/1/sgpatsh1r558icb29xmi3ucgq5qajtf9q53yuw73dzspu13d/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endpush