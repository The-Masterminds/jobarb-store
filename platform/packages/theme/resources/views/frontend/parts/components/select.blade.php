@props([
    'options' => [],
    'selected' => null,
    'placeholder' => 'Select an option',
    'class' => '',
])

@php
    // Base classes from your React component
    $triggerClasses = app('tw.merge')->merge(
        'flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background
        placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2
        disabled:cursor-not-allowed disabled:opacity-50',
        $class
    );

    // Options processing
    $isAssociative = count(array_filter(array_keys($options), 'is_string')) > 0;
@endphp

<select {{ $attributes->merge(['class' => $triggerClasses]) }}>
    @if($placeholder)
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif

    @foreach($options as $key => $value)
        <option
            value="{{ $isAssociative ? $key : $value }}"
            @if($selected && $selected == ($isAssociative ? $key : $value)) selected @endif
        >
            {{ $value }}
        </option>
    @endforeach
</select>
