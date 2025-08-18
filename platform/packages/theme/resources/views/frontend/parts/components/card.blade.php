@props(['class' => ''])

@php
    $classes = app('tw.merge')->merge('rounded-lg border bg-card text-card-foreground shadow-sm flex flex-col h-full', $class);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
