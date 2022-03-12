<div>
    <div class="flex justify-between flex-wrap">
        <div>
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Comments</h3>
        </div>
        <div>
            <button wire:click="add({{$post}})" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + Comment 
            </button>

        </div>
    </div>
    <div class="space-y-2">
        @forelse($comments->reverse() as $comment => $value)
        @foreach($value->comments as $key => $val)

        <div class="border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed shadow-inner bg-gray-200 text-black">

            <strong> {{$val->name}}</strong> <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($val->created_at)->diffForHumans() }}</span>
            <p class="text-sm">
                {{$val->body}}
            </p>
            @can('viewAny', App\Models\User::class)
            <div class="mt-2"> <button wire:click="delete({{$val->id}})"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                    </svg></button>
            </div>
            @endcan
        </div>

        @endforeach
        @empty <p class="dark:text-white"> No results found .. </p>
        @endforelse

        {{$comments->links('vendor.pagination.simple-tailwind')}}
    </div>

    <x-form-modal wire:model.defer="new">
        <x-slot name="title">     
        </x-slot>

        <x-slot name="content">
        <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Comment</span>
                <textarea maxlength="255" wire:model.defer="body" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="post something..."></textarea>
            </label>
        </x-slot>

        <x-slot name="footer">

            <x-secondary-button wire:click="$set('new', false)">
                Cancel
            </x-secondary-button>
            <x-button wire:click="save">
                Accept
            </x-button>
        </x-slot>
    </x-form-modal>

</div>