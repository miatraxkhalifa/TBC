@php
use App\Models\Category;
$categories = Category::orderby('name', 'ASC')->get();
@endphp

<div>
    <x-body>
        <x-slot name="body">
            <label class="block text-sm">
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                    <x-input wire:model.defer="name" placeholder="Post Title" />
                    <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </label>
        </x-slot>
    </x-body>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Categories
        </span>
    </label>
    <x-select2 wire:model.defer="category" multiple>
        @foreach($categories as $category)
        <option value="{{$category->id}}"> {{$category->name}} </option>
        @endforeach
    </x-select2>


    <!-- Section 1 -->
    <x-body wire:model.defer="group1">
        <x-slot name="body">
            <label class="block my-3 text-sm" >
                <span class="text-gray-700 dark:text-gray-400 pb-4">Section 1  </span>
                <x-input.tinymce wire:model.defer="message1" placeholder="Type anything you want..." />
            </label>
            <x-image-upload name="image1" 
            wire:model.defer="image1" 
            > </x-image-upload>
        </x-slot>
    </x-body>

    <!-- Section 2 -->
    <x-body wire:model.defer="group2">
        <x-slot name="body">
            <label class="block my-3 text-sm">
                <span class="text-gray-700 dark:text-gray-400 pb-4">Section 2</span>
                <x-input.tinymce wire:model="message2" placeholder="Type anything you want..." />
            </label>
            <x-image-upload name="image2"
            wire:model="image2" 
            > </x-image-upload>
        </x-slot>
    </x-body>

    <!-- Section 3 -->
    <x-body wire:model.defer="group3">
        <x-slot name="body">
            <label class="block my-3 text-sm" >
                <span class="text-gray-700 dark:text-gray-400 pb-4">Section 3</span>
                <x-input.tinymce wire:model="message3" placeholder="Type anything you want..." />
            </label>
            <x-image-upload name="image3"
            wire:model="image3" 
            > </x-image-upload>
        </x-slot>
    </x-body>



    <!-- Section 4 -->
    <x-body wire:model.defer="group4">
        <x-slot name="body">
            <label class="block my-3 text-sm" >
                <span class="text-gray-700 dark:text-gray-400 pb-4">Section 4</span>
                <x-input.tinymce wire:model="message4" placeholder="Type anything you want..." />
            </label>
            <x-image-upload name="image4"
            wire:model="image4" 
            > </x-image-upload>
        </x-slot>
    </x-body>
</div>