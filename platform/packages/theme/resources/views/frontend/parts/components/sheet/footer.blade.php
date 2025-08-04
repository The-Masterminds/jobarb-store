    @props(['class' => ''])

<div class="{{ 'flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 ' . $class }}" {{ $attributes }}>
    {{ $slot }}
</div>
