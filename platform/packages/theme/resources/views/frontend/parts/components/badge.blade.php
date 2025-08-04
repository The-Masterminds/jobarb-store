@props([
    'variant' => 'default', 
    'class' => '',
])

@php
    use TailwindMerge\TailwindMerge;

    $twMerge = TailwindMerge::instance();

    // Base classes (matches badgeVariants from React)
    $baseClasses = 'inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2';

    // Variant classes (replaces cva() variants)
    $variantClasses = [
        'default' => 'border-transparent bg-primary text-primary-foreground hover:bg-primary/80',
        'secondary' => 'border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80',
        'destructive' => 'border-transparent bg-destructive text-destructive-foreground hover:bg-destructive/80',
        'outline' => 'text-foreground',
    ][$variant] ?? '';

    // Merge with conflict resolution (replaces cn())
    $classes = $twMerge->merge($baseClasses, $variantClasses, $class);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
