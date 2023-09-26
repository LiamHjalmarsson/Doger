<div {{ $attributes->class("box") }}>
    <label for="{{ $name }}" class="label">
        {{ $name }}
    </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" @if(old($name) !== null) value="{{ old($name) }}" @endif class="input"/>

    <div style="height: 10px; text-align:center; margin-top: 0.2rem;">
        @error($name)
                <p>
                    {{ $message }}
                </p>
        @enderror    
    </div>
</div>