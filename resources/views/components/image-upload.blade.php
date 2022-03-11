@props([
'file' => null,
'accept' => 'image/jpg,image/jpeg,image/png,application/pdf',
'multiple' => false,
'mode' => 'attachment',
'profileClass' => 'w-20 h-20 rounded-full'
])

<div class="overflow-hidden relative"
x-data="{ isUploading: false, progress: 0 }"
x-on:livewire-upload-start="isUploading = true"
x-on:livewire-upload-finish="isUploading = false"
x-on:livewire-upload-error="isUploading = false"
x-on:livewire-upload-progress="progress = $event.detail.progress"
>

    <input type="file" class="cursor-pointer absolute block py-2 px-4 w-full pin-r pin-t opacity-0"
        {{ $attributes->wire('model') }}
    />
    <button 
        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-black dark:text-white transition-colors duration-150 bg-grey-600 border border-transparent rounded-lg active:bg-grey-600 hover:bg-grey-700 focus:outline-none focus:shadow-outline-grey">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                clip-rule="evenodd" />
        </svg>
        <span class="text-xs">Attach Image </span>
    </button>




    <div x-show="isUploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div>

</div>

<script>
    @once
window.addEventListener('livewire-upload-finish', event => {
    toastr.info('File uploaded - Validating..');
});
window.addEventListener('livewire-upload-error', event => {
    toastr.error('An error has occurred!');
});
@endonce
    </script>

