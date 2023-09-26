<div {{ $attributes->class("box") }}>
    <label for="{{ $name }}" class="label">
        {{ $name }}
    </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" @if(old($name) !== null) value="{{ old($name) }}" @endif class="input"/>

    @error($name)
        <div class="message">
            <p>
                {{ $message }}
            </p>
        </div>
    @enderror    
</div>