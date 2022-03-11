<div class="container grid px-6 mx-auto">
    <div class="flex justify-between flex-wrap">
        <div>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Categories
            </h2>
        </div>
        <div class="my-6">
            <button wire:loading.attr="disabled" wire:click.prevent="addCategory" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
                <span>New</span>
            </button>
        </div>
    </div>

    <div class="grid gap-4 mb-1 w-auto xs:grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-7">
        <!-- Card -->
        @foreach($category as $data)
        @if($loop->odd)
        <div class="flex items-center justify-between p-4 text-orange-500 bg-orange-100 rounded-lg shadow-xs dark:bg-gray-800 dark:text-white">
            <div>
                <p class="text-sm font-semibold">
                    {{$data->name}} -
                    <span class="text-xs font-semibold">
                        {{$data->countPost->count()}}
                    </span>
                </p>
            </div>

            <div class="relative -mt-4 -mr-2">
                <button wire:click.defer="removeCategory({{$data->id}})" class=" flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-orange-500 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        @endif
        @if($loop->even)
        <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div>
                <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    {{$data->name}} -
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-200">
                    {{$data->countPost->count()}}
                    </span>
                </p>
            </div>

            <div class="relative -mt-4 -mr-2">
                <button wire:click.defer="removeCategory({{$data->id}})" class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <div class="relative mt-2">
    {{$category->links('vendor.pagination.simple-tailwind')}}
    </div>
    <x-dialog-modal wire:model="remove">
        <x-slot name="title"> Remove Category </x-slot>
        <x-slot name="content"> Are you sure you want to remove? </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('remove', false)">
                Cancel
            </x-secondary-button>
            <x-button wire:click="confirmedRemove">
                Accept
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-form-modal wire:model="add">
        <x-slot name="title"> New Category </x-slot>
        <x-slot name="content">

            <label class="block text-sm">
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                    <input wire:model.defer="name" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Add multiple categories separated by a comma.." />
                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                </div>
            </label>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('add', false)">
                Cancel
            </x-secondary-button>
            <x-button wire:click="confirmedAdd">
                Accept
            </x-button>
        </x-slot>
    </x-form-modal>
</div>