@props(['side' => 'right'])

<div
  x-data="{ open: false }"
  x-on:keydown.escape.window="open = false"
  class="relative"
>
  <!-- Sheet Trigger -->
  <button x-on:click="open = true" {{ $attributes->merge(['class' => '']) }}>
    {{ $trigger ?? 'Open' }}
  </button>

  <!-- Overlay -->
  <div
    x-show="open"
    x-transition.opacity
    class="fixed inset-0 z-50 bg-black/80"
  ></div>

  <!-- Sheet Panel -->
  <div
    x-show="open"
    x-transition:enter="transition ease-in-out duration-500"
    x-transition:enter-start="{{ $side === 'left' ? '-translate-x-full' : 'translate-x-full' }}"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="{{ $side === 'left' ? '-translate-x-full' : 'translate-x-full' }}"
    class="fixed inset-y-0 {{ $side === 'left' ? 'left-0' : 'right-0' }} z-50 w-3/4 bg-white p-6 shadow-lg sm:max-w-sm"
  >
    <!-- Close Button -->
    <button
      x-on:click="open = false"
      class="absolute right-4 top-4 rounded-sm opacity-70 transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
    >
      <i data-lucide="x" class="h-5 w-5"></i>
      <span class="sr-only">Close</span>
    </button>

    {{ $slot }}
  </div>
</div>
