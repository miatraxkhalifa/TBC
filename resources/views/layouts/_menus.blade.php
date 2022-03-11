<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{route('welcome')}}">
        {{ config('app.name') }}
    </a>
    <ul class="mt-6">
        <div x-data="{ openDashboard: false }">
            <li class="relative px-6 py-3" x-on:click="openDashboard = ! openDashboard">
                {!! request()->routeIs('dashboard') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
                <span data-turbolinks-action="replace" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="{{route('dashboard')}}">
                    <svg class="w-5 h-5" ari a-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4"> {{ __('Dashboard') }} </span>
                </span>

            </li>
            <div class="pl-12" x-show="openDashboard">
                <ul class="flex flex-col pl-2 text-gray-500 border-l border-gray-700 dark:border-gray-100">
                    <li>
                        <a href="{{route('dashboard')}}" class="inline-block w-full px-1 py-1 text-xs rounded hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-500 focus:text-white dark:hover:bg-gray-200 dark:hover:text-gray-900 dark:text-gray-100">Main</a>
                    </li>
                    <li>
                        <a href="{{route('blogs.new')}}" class="inline-block w-full px-1 py-1 text-xs rounded hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-500 focus:text-white dark:hover:bg-gray-200 dark:hover:text-gray-900 dark:text-gray-100">New Blog</a>
                    </li>
                    <li>
                        <a href="{{route('blogs.user')}}" class="inline-block w-full px-1 py-1 text-xs rounded hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-500 focus:text-white dark:hover:bg-gray-200 dark:hover:text-gray-900 dark:text-gray-100">My Blogs</a>
                    </li>
                    <li>
                        <a href="{{route('category')}}" class="inline-block w-full px-1 py-1 text-xs rounded hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-1 focus:ring-gray-500 focus:text-white dark:hover:bg-gray-200 dark:hover:text-gray-900 dark:text-gray-100"> Categories</a>
                    </li>
                </ul>
            </div>
        </div>

        <li class="relative px-6 py-3">
            {!! request()->routeIs('profile.show') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a data-turbolinks-action="replace" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{route('profile.show')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="ml-4">Profile</span>
            </a>
        </li>

        <li class="relative px-6 py-3">
            {!! request()->routeIs('users') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a data-turbolinks-action="replace" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{route('users')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="ml-4">Users</span>
            </a>
        </li>

        <li class="relative px-6 py-3">
            {!! request()->routeIs('social') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a data-turbolinks-action="replace" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{route('social')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                </svg>
                <span class="ml-4">Social Links</span>
            </a>
        </li>

    </ul>
</div>