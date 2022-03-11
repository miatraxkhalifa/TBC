
<div x-data="{ show: @entangle($attributes->wire('model')) }" x-show="show" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false">
    <div x-show="show" x-on:click="show = false" >
      
    </div>

    <div x-show="show" x-transition:enter="motion-safe:animate-fadeIn" x-transition:leave="motion-safe:animate-fadeOut"  >
        {{ $body }}
    </div>
</div>