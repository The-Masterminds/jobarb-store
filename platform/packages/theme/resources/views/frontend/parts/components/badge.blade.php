@props(['class' => ''])

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium ' . $class]) }}>
    {{ $slot }}
</span>
