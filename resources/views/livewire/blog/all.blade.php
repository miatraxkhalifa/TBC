<div>
    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between flex-wrap">

            <div class="relative w-full max-w-xl focus-within:text-purple-500 my-6 xs:-mt-6 sm:-mt-6">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model.debounce.500ms="search" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-black focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search blogs" aria-label="Search" />
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="grid gap-6 mb-8 md:grid-cols-1">
                    @forelse ($posts as $post)
                   
                    @if($loop->odd)
                    <a href="{{route('post.show', [$post->slug]) }}">
                        <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xl">

                            <h4 class="mb-1 font-semibold space-x-1">
                                {{$post->name}}

                                @foreach($post->category as $key => $value)
                                @if($loop->even)
                                <span class="px-1 text-xs leading-none text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-full  hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                    {{$value->name}} </span>
                                @elseif ($loop->last) <span class="px-1 text-xs leading-none text-white transition-colors duration-150 bg-black border border-transparent rounded-full  hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray">
                                    {{$value->name}} </span>
                                @else <span class="px-1 text-xs leading-none text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-full  hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow">
                                    {{$value->name}} </span>
                                @endif
                                @endforeach

                            </h4>
                            <section class="text-white">
                                @isset($post->body[0]->body)
                                {!! implode(' ', array_slice(explode(' ', $post->body[0]->body), 0, 30)); !!} ...

                                @endisset
                            </section>
                            <p class="pt-2 text-xs font-medium dark:text-white">By: {{$post->user->name}} · <span class="mx-1"> {{
                \Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span> ·
                                <span class="text-xs dark:text-gray-50"> {{$post->likes}} Likes <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-flex -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg> </span>  · <span>  {{count($post->comment)}} Comments  </span>
                            </p>
                        </div>
                    </a>

                    @elseif($loop->even)
                    <a href="{{route('post.show', [$post->slug]) }}">
                        <div class="min-w-0 p-4 text-black bg-pink-200 dark:bg-pink-400 dark:text-white rounded-lg shadow-xl">
                            <h4 class="mb-1 font-semibold space-x-1">
                                {{$post->name}}
                                @foreach($post->category as $key => $value)
                                @if($loop->even)
                                <span class="px-1 text-xs leading-none text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-full  hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                    {{$value->name}} </span>
                                @elseif ($loop->last) <span class="px-1 text-xs leading-none text-white transition-colors duration-150 bg-black border border-transparent rounded-full  hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray">
                                    {{$value->name}} </span>
                                @else <span class="px-1 text-xs leading-none text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-full  hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow">
                                    {{$value->name}} </span>
                                @endif
                                @endforeach
                            </h4>
                            <section class="text-gray-900 dark:text-gray-800">
                                @isset($post->body[0]->body)
                                {!! implode(' ', array_slice(explode(' ', $post->body[0]->body), 0, 30)); !!} ...

                                @endisset
                            </section>
                            <p class="pt-2 text-xs font-medium dark:text-black space-x-1">By: {{$post->user->name}} · <span class="mx-1"> {{
                \Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span> ·
                                <span class="text-xs dark:text-black"> {{$post->likes}} Likes <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-flex -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg> </span>  · <span>  {{count($post->comment)}} Comments  </span>
                            </p>

                        </div>
                    </a>

                    @endif
                    @empty
                    <p class="dark:text-white"> No results found .. </p>
                    @endforelse

                </div>
                {{$posts->links('vendor.pagination.simple-tailwind')}}
            </div>



        </div>

    </div>

</div>