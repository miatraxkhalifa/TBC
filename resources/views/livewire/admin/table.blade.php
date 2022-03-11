<div>
    <div class="flex justify-between flex-wrap">
        <h4 class="mt-6 mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Posts
        </h4>
        <div class="relative w-full max-w-xl focus-within:text-purple-500 my-6 xs:-mt-6 sm:-mt-6">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model.debounce.500ms="q" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for blogs" aria-label="Search" />
        </div>
    </div>


    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3" wire:click.defer="sortBy('name')">Name</th>
                        <th class="px-4 py-3" wire:click.defer="sortBy('views')">Views</th>
                        <th class="px-4 py-3" wire:click.defer="sortBy('likes')">Likes</th>
                        <th class="px-4 py-3" wire:click.defer="sortBy('status')">Status</th>
                        <th class="px-4 py-3" wire:click.defer="sortBy('created_at')">Date</th>
                        <th class="px-4 py-3">Publish</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($data as $value)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-2 text-xs">
                       
                            <p class="font-semibold">{{$value->name}}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                By: {{$value->user->name}}
                            </p>
                        </td>
                        <td class="px-4 py-2 text-xs">
                            {{$value->views}}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            {{$value->likes}}
                        </td>
                        <td class="px-4 py-2 text-xs"> @if($value->status == 1)
                            <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                Published
                            </span>
                            @elseif ($value->status == 0)
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                Pending
                            </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-xs">
                            {{ \Carbon\Carbon::parse( $value->created_at )->toFormattedDateString() }}
                        </td>

                        <td class="px-4 py-3">
                           <div>
                            @livewire('admin.table.published', ['model' => $value, 'field' => 'status'], key($value->id))
                           </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-xs" colspan="6">  <p class="font-semibold">Nothing to show.. </p>  </td>
                    </tr>
                  
                    @endforelse
                </tbody>
            </table>
        </div>
        {{$data->links('vendor.pagination.simple-tailwind')}}
    </div>
</div>