@props([
    'class' => '',
])

@php
    $baseClasses = 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70';
    $classes = app('tw.merge')->merge($baseClasses, $class);
@endphp

<label {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</label>
