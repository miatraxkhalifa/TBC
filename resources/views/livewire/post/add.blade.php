<div>
    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between flex-wrap">
            <div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    New Post
                </h2>
            </div>

            <div class="my-6">
                <button wire:loading.attr="disabled" wire:click.prevent="submit" wire:loading.class.remove="bg-purple-600 text-white hover:bg-purple-700"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    <span>Save</span>
                </button>
            </div>
     
        </div>

        <div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                    <input wire:model.defer="name"
                        class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:border-purple-400 form-input"
                        placeholder="Post Title" />
                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </label>




            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Categories
                </span>
            </label>
            <x-select2 wire:model.defer="category" multiple>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </x-select2>



            <!-- Section 1 -->
            <label class="block my-3 text-sm" wire:ignore>
                <span class="text-gray-700 dark:text-gray-400 pb-4">Section 1</span>
                <x-input.tinymce wire:model="message1" placeholder="Type anything you want..." />
            </label>

            <div class="flex justify-between -mt-2">
               <x-image-upload name="image1"
               wire:model="image1" 
               > </x-image-upload>
                <div class="mt-2">
                    <x-body wire:model="add">
                        <x-slot name="body">
                            <button wire:click="addRows"
                                class="flex items-center justify-between px-4 text-sm font-medium leading-5 text-indigo-700 dark:text-purple-400 transition-colors duration-150 bg-grey-600 border border-transparent rounded-lg active:bg-grey-600 hover:bg-grey-700 focus:outline-none focus:shadow-outline-grey">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2 -ml-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium leading-5 text-xs focus:shadow-outline-purple">Add Section
                                </span>
                            </button>
                        </x-slot>
                    </x-body>
                    <x-body wire:model="remove">
                        <x-slot name="body">
                            <button wire:click="removeRows"
                                class="flex items-center justify-between px-4 text-sm font-medium leading-5 text-red-300 dark:text-red-300 transition-colors duration-150 bg-grey-600 border border-transparent rounded-lg active:bg-grey-600 hover:bg-grey-700 focus:outline-none focus:shadow-outline-grey">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2 -ml-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium leading-5 text-xs focus:shadow-outline-purple">Remove Section
                                </span>
                            </button>
                        </x-slot>
                    </x-body>
                </div>
            </div>

            <!-- Section 2 -->
            <x-body wire:model="group1">
                <x-slot name="body">
                    <label class="block my-3 text-sm" wire:ignore>
                        <span class="text-gray-700 dark:text-gray-400 pb-4">Section 2</span>
                        <x-input.tinymce wire:model="message2" placeholder="Type anything you want..." />
                    </label>

                    <x-image-upload name="image2"
                    wire:model="image2" 
                    > </x-image-upload>
                </x-slot>
            </x-body>

            <!-- Section 3 -->
            <x-body wire:model="group2">
                <x-slot name="body">
                    <label class="block my-3 text-sm" wire:ignore>
                        <span class="text-gray-700 dark:text-gray-400 pb-4">Section 3</span>
                        <x-input.tinymce wire:model="message3" placeholder="Type anything you want..." />
                    </label>
                    <x-image-upload name="image3"
                    wire:model="image3" 
                    > </x-image-upload>
                </x-slot>
            </x-body>

            <!-- Section 4 -->
            <x-body wire:model="group3">
                <x-slot name="body">
                    <label class="block my-3 text-sm" wire:ignore>
                        <span class="text-gray-700 dark:text-gray-400 pb-4">Section 4</span>
                        <x-input.tinymce wire:model="message4" placeholder="Type anything you want..." />
                    </label>

                    <x-image-upload name="image4"
                    wire:model="image4" 
                    > </x-image-upload>
                </x-slot>
            </x-body>

        </div>

    </div>

</div>


