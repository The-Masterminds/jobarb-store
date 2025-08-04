@props(['class' => ''])

@php
    $classes = app('tw.merge')->merge('text-2xl font-semibold leading-none tracking-tight', $class);
@endphp

<h3 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h3>
