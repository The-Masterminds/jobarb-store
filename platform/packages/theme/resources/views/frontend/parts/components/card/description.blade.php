@props(['class' => ''])

@php
    $classes = app('tw.merge')->merge('text-sm text-muted-foreground', $class);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
