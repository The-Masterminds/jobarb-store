@props(['class' => ''])

@php
    $classes = TailwindMerge::instance()->merge(
        'text-sm text-muted-foreground',
        $class
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
