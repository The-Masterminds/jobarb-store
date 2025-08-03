@props([
    'side' => 'right', // right, left, top, bottom
])

@php
    $sideClasses = [
        'top' => 'inset-x-0 top-0 border-b slide-in-from-top',
        'bottom' => 'inset-x-0 bottom-0 border-t slide-in-from-bottom',
        'left' => 'inset-y-0 left-0 h-full w-3/4 border-r slide-in-from-left sm:max-w-sm',
        'right' => 'inset-y-0 right-0 h-full w-3/4 border-l slide-in-from-right sm:max-w-sm',
    ];
@endphp

<div x-data="{ open: false }" class="relative">
    {{-- Trigger --}}
    <div @click="open = true">
        {{ $trigger }}
    </div>

    {{-- Overlay --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-black/80"
        @click="open = false"
    ></div>

    {{-- Sheet Content --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed z-50 p-6 bg-white shadow-lg {{ $sideClasses[$side] ?? $sideClasses['right'] }}"
    >
        {{-- Close button --}}
        <button
            @click="open = false"
            class="absolute right-4 top-4 text-gray-700 hover:text-black"
        >
            <x-icon name="x" class="h-5 w-5" />
        </button>

        {{-- Content slot --}}
        {{ $slot }}
    </div>
</div>
