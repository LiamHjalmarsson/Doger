<div {{ $attributes->class("box") }}>
    <label for="{{ $name }}" class="label">
        {{ $name }}
        @if ($required)
            <span>
                *
            </span>
        @endif
    </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" class="input" autocomplete="off"/>

    <div style="height: 10px; text-align:center; margin-top: 0.2rem;">
        @error($name)
                <p>
                    {{ $message }}
                </p>
        @enderror    
    </div>
</div>