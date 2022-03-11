@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 dark:bg-gray-800 dark:text-white ">
        <div class="text-lg flex-shrink-0 flex space-x-2">
            <div class="mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                {{ $title }}
            </div>
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 text-right bg-gray-100 dark:bg-gray-800 dark:text-white">
        {{ $footer }}
    </div>
</x-modal>