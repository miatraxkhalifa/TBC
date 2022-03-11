<div>
<x-section-title>
    <x-slot name="title">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="flex justify-between flex-wrap">
                    <div>
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Edit Post
                        </h2>
                    </div>
                    <div class="mt-8">
                        <x-button wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class.remove="bg-purple-600 text-white hover:bg-purple-700">
                            Update
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="description">

        <x-post-form> </x-post-form> 

    </x-slot>

</x-section-title>
</div>
