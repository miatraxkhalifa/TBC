<div class="container grid px-6 mx-auto">
    <div class="flex justify-between flex-wrap">
        <h4 class="mt-6 mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            My Posts
        </h4>
        <div class="relative w-full max-w-xl focus-within:text-purple-500 my-6 xs:-mt-6 sm:-mt-6">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model.debounce.500ms="q" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for posts" aria-label="Search" />
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3" wire:click.defer="sortBy('name')">Title</th>
                        <th class="px-4 py-3" wire:click.defer="sortBy('status')">Status</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($posts as $post)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="{{$post->user->profile_photo_url}}" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">{{$post->name}}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        By: {{$post->user->name}}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs space-x-1">
                            @if($post->status == 1)
                            <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                Published
                            </span>
                            @elseif ($post->status == 0)
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                Pending
                            </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-xs space-x-1">
                            @foreach ($post->category as $key => $value)
                            @if($loop->odd)
                            <span class="px-2 text-xs font-semibold text-white bg-purple-500 rounded-full dark:bg-purple-500 dark:text-white">
                                {{$value->name}}
                            </span>
                            @endif

                            @if($loop->even)
                            <span class="px-2 text-xs font-semibold text-white bg-orange-500 rounded-full dark:bg-orange-500 dark:text-white">
                                {{$value->name}}
                            </span>
                            @endif
                            @endforeach
                        </td>
                        <td class="px-4 py-2 text-xs">
                            <div class="flex items-center space-1 text-sm">
                                <a href="{{route('blogs.edit', [$post->slug]) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a> 
                                <button wire:click="delete({{$post->id}})" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-xs" colspan="4">  <p class="font-semibold">Nothing to show.. </p>  </td>
                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
        {{$posts->links('vendor.pagination.simple-tailwind')}}
    </div>


    <x-dialog-modal wire:model.defer="deleteModal">
        <x-slot name="title">
            {{ __('Archive Post') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this post?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('deleteModal', false)">
                Cancel
            </x-secondary-button>
            <x-button wire:click="confirmDelete">
                Accept
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>