<div class="grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">
    @forelse($posts as $post)
    <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">

        @isset($post->body[0]->image)
        <a href="{{route('post.show', [$post->slug]) }}" class="block">
            <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-xl max-h-56" title="{{$post->name}}"
            alt="{{$post->name}}"
            src="https://drive.google.com/uc?export=view&id={{$post->body[0]->image}}">
        </a>
        @else
        <a href="{{route('post.show', [$post->slug]) }}" class="block">
            <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-xl max-h-56" title="{{$post->name}}"
                alt="{{$post->name}}" src="{{ asset('img/login-office-dark.jpg')}}">
        </a>

        @endisset

        <ul class="flex flex-row flex-wrap space-x-1">
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
        <h2 class="text-lg font-bold sm:text-xl md:text-2xl dark:text-gray-50"><a href="{{route('post.show', [$post->slug]) }}">{{$post->name}}</a></h2>
        <p class="text-sm text-gray-500 dark:text-gray-50"> @isset($post->body[0]->body) 
            {!! implode(' ', array_slice(explode(' ', $post->body[0]->body), 0, 10)); !!} 
           
            @endisset

        </p>
        <p class="pt-2 text-xs font-medium dark:text-white">By: {{$post->user->name}} · <span class="mx-1"> {{
                \Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span> ·
            <span class="text-xs dark:text-gray-50"> {{$post->likes}} Likes <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 inline-flex -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                </svg> </span>
        </p>
    </div>


    @empty <p class="dark:text-gray-50"> ... </p>
    @endforelse
</div>