<section class="relative w-full px-8 text-gray-700  body-font dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <a href="{{route ('welcome')}}" class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-black select-none dark:text-white">The Bisdak Coder.</a>

        <nav class="top-0 left-0 z-0 flex items-center justify-center w-full h-full py-5 -ml-0 space-x-5 text-base md:-ml-5 md:py-0 md:absolute">
            <a href="{{route('welcome')}}" class="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900 dark:hover:text-gray-300 dark:text-white" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <span class="block">Home</span>
                <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-gray-900 dark:bg-white" x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                </span>
            </a>

            <a href="{{route('post.all')}}" class="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900 dark:hover:text-gray-300 dark:text-white" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <span class="block">Blogs</span>
                <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-gray-900 dark:bg-white" x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                </span>
            </a>

            <a href="{{route('contributors')}}" class="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900 dark:hover:text-gray-300 dark:text-white" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <span class="block">Contributors</span>
                <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-gray-900 dark:bg-white" x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                </span>
            </a>

            <a href="{{route('support')}}" class="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900 dark:hover:text-gray-300 dark:text-white" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <span class="block">Support</span>
                <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-gray-900 dark:bg-white" x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                </span>
            </a>
            

           
            <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                <template x-if="!dark">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                            </path>
                        </svg>
                </template>
                <template x-if="dark">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </button>
            
        </nav>

        @if (Route::has('login'))
        <div class="relative z-10 inline-flex items-center space-x-3 md:ml-5 lg:justify-end">
        @auth
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none rounded-3xl">
              Go to Dashboard
            </a>   @else
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none rounded-3xl">
                Sign in
            </a>    @if (Route::has('register'))
            <span class="inline-flex rounded-md shadow-sm">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-purple-700 border border-purple-800 shadow-sm hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-600 rounded-3xl">
                    Sign up
                </a>
            </span> @endif    @endauth
        </div>@endif 
    </div>
</section>