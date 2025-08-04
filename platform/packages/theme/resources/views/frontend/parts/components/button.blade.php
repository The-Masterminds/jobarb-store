@props([
    'variant' => 'default', // 'default' | 'destructive' | 'outline' | 'secondary' | 'ghost' | 'link'
    'size' => 'default',    // 'default' | 'sm' | 'lg' | 'icon'
    'asChild' => false,
    'type' => 'button',
    'disabled' => false,
])

@php
    // Use the correct facade from gehrisandro's package
    use TailwindMerge\TailwindMerge;

    // Initialize the merger (configurable via config/tailwind-merge.php)
    $twMerge = TailwindMerge::instance();

    // Base classes
    $baseClasses = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0';

    // Variant classes
    $variantClasses = [
        'default' => 'bg-primary text-primary-foreground hover:bg-primary/90',
        'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90',
        'outline' => 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/80',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground',
        'link' => 'text-primary underline-offset-4 hover:underline',
    ][$variant] ?? '';

    // Size classes
    $sizeClasses = [
        'default' => 'h-10 px-4 py-2',
        'sm' => 'h-9 rounded-md px-3',
        'lg' => 'h-11 rounded-md px-8',
        'icon' => 'h-10 w-10',
    ][$size] ?? '';

    // Merge with conflict resolution
    $classes = $twMerge->merge(
        $baseClasses,
        $variantClasses,
        $sizeClasses,
        $attributes->get('class')
    );

@endphp

@if($asChild)
    <div {{ $attributes->except('class')->merge(['class' => $classes]) }}>
        {{ $slot }}
    </div>
@else
    <button
        type="{{ $type }}"
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->except('class')->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </button>
@endif
