@props(['open' => false])

<div x-data="{ open: @js($open) }" {{ $attributes }}>
    {{ $slot }}
</div>
