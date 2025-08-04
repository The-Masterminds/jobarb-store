@props(['class' => ''])

@php
    $classes = TailwindMerge::instance()->merge(
        'flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2',
        $class
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
