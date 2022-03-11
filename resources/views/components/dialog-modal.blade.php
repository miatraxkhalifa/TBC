@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 dark:bg-gray-800 dark:text-white ">
        <div class="text-lg flex-shrink-0 flex space-x-2">
            <div class="mt-1">
                <svg class="h-5 w-5 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
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