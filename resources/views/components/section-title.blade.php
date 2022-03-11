<div class="md:col-span-1"  x-data="{ show: @entangle($attributes->wire('model')) }" x-show="show">
    <div  x-show="show" class="px-4 sm:px-0" x-transition:enter="motion-safe:animate-fadeIn" x-transition:leave="motion-safe:animate-fadeOut">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    </div>
</div>
