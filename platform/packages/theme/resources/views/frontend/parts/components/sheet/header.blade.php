@props(['class' => ''])

@php
    $classes = TailwindMerge::instance()->merge(
        'flex flex-col space-y-2 text-center sm:text-left',
        $class
    );
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
