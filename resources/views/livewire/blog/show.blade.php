<div class="container grid px-6 mx-auto">
    <div class="mb-2 shadow-lg grid gap-1 md:grid-cols-1 bg-gray-50 dark:bg-gray-800">
        <div>
            <h2 class="my-2 text-2xl pl-4 font-semibold text-gray-700 dark:text-gray-200">
                {{$post->name}}
            </h2>

            <ul class="flex flex-row flex-wrap space-x-1 pl-4 mb-2">
                @foreach($post->category as $key => $value)
                @if($loop->even)
                <li
                    class="px-2 py-1 text-xs font-medium leading-none text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    {{$value->name}} </li>
                @elseif ($loop->last) <li
                    class="px-2 py-1 text-xs font-medium leading-none text-white transition-colors duration-150 bg-pink-600 border border-transparent rounded-full active:bg-pink-600 hover:bg-pink-700 focus:outline-none focus:shadow-outline-pink">
                    {{$value->name}} </li>
                @else <li
                    class="px-2 py-1 text-xs font-medium leading-none text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-full active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow">
                    {{$value->name}} </li>

                @endif
                @endforeach
            </ul>

            <p class="pl-4 text-xs font-medium dark:text-white">By: {{$post->user->name}} &nbsp; · <span class="mx-1"> {{
                \Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span> ·
            <span class="text-xs dark:text-gray-50"> &nbsp; {{$post->likes}} Likes  </span>
             </p>
        </div>
        <div x-data="{ open: true }" class="mb-2 pl-4 flex justify-items-stretch text-gray-700 dark:text-gray-200"> 
            <section        x-show="open"
            x-transition:enter="transition ease-out duration-900"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-900"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">
            <button @click="open = ! open" 
                    wire:click.prevent="like"
            class="my-2 text-xl pl-4 font-semibold justify-self-end hover:text-blue-700 focus:outline-none focus:shadow-outline-blug"> 
                <svg xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5 inline-flex -mt-2 justify-self-end" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
        </svg>
                Like &nbsp; &nbsp; </button> </section>
        </div>
    </div>

    <div class="grid gap-6 mb-8 md:grid-cols-1">
        @foreach($post->body as $body)
        <div class="min-w-0 p-4 text-gray-600 dark:text-gray-300 bg-white rounded-lg  dark:bg-gray-800 shadow-lg">
            {!!$body->body!!}
        </div>
        @isset($body->image)
        <div class="min-w-0 p-4 text-white bg-gray-200 dark:bg-gray-700 rounded-lg shadow-lg">
                <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96" title="{{$body->post->name}}" alt="{{$body->post->name}}"
                 src="https://drive.google.com/uc?export=view&id={{$body->image}}">
        </div>
        @endisset      
        @endforeach
    </div>
    <div class="mb-16">
    <livewire:blog.comment :post="$post->id" />
    </div>
</div>