@props(['class' => ''])

<p class="{{ 'text-sm text-muted-foreground ' . $class }}" {{ $attributes }}>
    {{ $slot }}
</p>
