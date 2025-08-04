@props(['asChild' => false])

@if($asChild)
    <div @click="open = true" {{ $attributes }}>
        {{ $slot }}
    </div>
@else
    <button @click="open = true" {{ $attributes }}>
        {{ $slot }}
    </button>
@endif
