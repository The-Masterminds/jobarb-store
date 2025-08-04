@props(['class' => ''])

<h3 class="{{ 'text-lg font-semibold text-foreground ' . $class }}" {{ $attributes }}>
    {{ $slot }}
</h3>
