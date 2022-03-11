<div class="flex flex-col items-center sm:px-5 md:flex-row">
    <div class="w-full md:w-1/2">   @isset($post)     @isset($post->body[0]->image)
        <a href="{{route('post.show', [$post->slug]) }}" class="block">
            <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96" title="{{$post->name}}"
                alt="{{$post->name}}" src="https://drive.google.com/uc?export=view&id={{$post->body[0]->image}}">
        </a>  
        @else
        <a href="{{route('post.show', [$post->slug]) }}" class="block">
            <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96" title="{{$post->name}}"
                alt="{{$post->name}}" src="{{ asset('img/login-office.jpg')}}">
        </a>  

        @endisset
    </div> 
    <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
        <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
            <div
                class="bg-pink-600 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white">
                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <span>Featured </span>
            </div>
            <h1 class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl dark:text-gray-50"><a
                    href="{{route('post.show', [$post->slug]) }}">{{$post->name}}</a></h1>
            <p class="pt-2 text-sm font-medium dark:text-gray-50">by <a href="{{route('post.show', [$post->slug]) }}"
                    class="mr-1 underline dark:text-white"> {{$post->user->name}} </a> · <span class="mx-1"> {{
                    \Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span> ·

                <span class="text-xs dark:text-gray-50"> {{$post->likes}} Likes <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 inline-flex -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg> </span>
            </p>


        </div> @else

        <p class="dark:text-gray-50"> Nothing to show </p>   @endisset
    </div>
</div>
 