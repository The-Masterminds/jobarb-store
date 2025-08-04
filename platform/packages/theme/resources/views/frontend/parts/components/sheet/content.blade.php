@props([
    'side' => 'right', // 'top' | 'bottom' | 'left' | 'right'
    'withClose' => true,
    'class' => ''
])

@php
    use TailwindMerge\TailwindMerge;
    $tw = TailwindMerge::instance();

    // Base classes
    $baseClasses = 'fixed z-50 gap-4 bg-background p-6 shadow-lg transition ease-in-out data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:duration-300 data-[state=open]:duration-500';

    // Side-specific classes
    $sideClasses = [
        'top' => 'inset-x-0 top-0 border-b data-[state=closed]:slide-out-to-top data-[state=open]:slide-in-from-top',
        'bottom' => 'inset-x-0 bottom-0 border-t data-[state=closed]:slide-out-to-bottom data-[state=open]:slide-in-from-bottom',
        'left' => 'inset-y-0 left-0 h-full w-3/4 border-r data-[state=closed]:slide-out-to-left data-[state=open]:slide-in-from-left sm:max-w-sm',
        'right' => 'inset-y-0 right-0 h-full w-3/4 border-l data-[state=closed]:slide-out-to-right data-[state=open]:slide-in-from-right sm:max-w-sm',
    ][$side] ?? '';

    $classes = $tw->merge($baseClasses, $sideClasses, $class);

    // Determine enter/leave transitions based on side
    $enterStart = '';
    $leaveEnd = '';

    switch ($side) {
        case 'top':
            $enterStart = 'transform -translate-y-full';
            $leaveEnd = 'transform -translate-y-full';
            break;
        case 'bottom':
            $enterStart = 'transform translate-y-full';
            $leaveEnd = 'transform translate-y-full';
            break;
        case 'left':
            $enterStart = 'transform -translate-x-full';
            $leaveEnd = 'transform -translate-x-full';
            break;
        case 'right':
            $enterStart = 'transform translate-x-full';
            $leaveEnd = 'transform translate-x-full';
            break;
    }
@endphp

<!-- Overlay -->
<div
    x-show="open"
    @click.away="open = false"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 bg-black/80"
></div>

<!-- Content -->
<div
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="{{ $enterStart }}"
    x-transition:enter-end="transform translate-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="transform translate-0"
    x-transition:leave-end="{{ $leaveEnd }}"
    class="{{ $classes }}"
    {{ $attributes->except('class') }}
>
    @if($withClose)
        <button
            @click="open = false"
            class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none"
        >
            <i data-lucide="x" class="h-4 w-4"></i>
            <span class="sr-only">Close</span>
        </button>
    @endif

    {{ $slot }}
</div>
