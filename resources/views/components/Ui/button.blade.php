<button {{ $attributes->merge(['class' => 'button']) }} type="{{ $type }}">
    {{ $slot }}
</button>
