@props(['class' => ''])

@php
    $classes = app('tw.merge')->merge('flex items-center p-6 pt-0', $class);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
