@props(['class' => ''])

@php
    $classes = TailwindMerge::instance()->merge(
        'text-lg font-semibold text-foreground',
        $class
    );
@endphp

<h3 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h3>
