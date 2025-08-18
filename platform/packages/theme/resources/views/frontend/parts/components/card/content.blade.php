@props(['class' => ''])

@php
    $classes = app('tw.merge')->merge('p-6 flex-grow', $class);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
