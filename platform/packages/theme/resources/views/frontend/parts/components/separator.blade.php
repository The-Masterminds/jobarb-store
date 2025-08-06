@props([
    'orientation' => 'horizontal', // 'horizontal' or 'vertical'
    'decorative' => true,
    'class' => '',
])

@php
    $baseClasses = 'shrink-0 bg-border';
    $orientationClasses = $orientation === 'horizontal' ? 'h-[1px] w-full' : 'h-full w-[1px]';
    $classes = app('tw.merge')->merge("$baseClasses $orientationClasses", $class);
@endphp

<div
    role="{{ $decorative ? 'none' : 'separator' }}"
    aria-orientation="{{ $orientation }}"
    {{ $attributes->merge(['class' => $classes]) }}
></div>
