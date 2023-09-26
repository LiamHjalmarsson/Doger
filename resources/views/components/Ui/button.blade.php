<button {{ $attributes->class("button") }} type={{ $type ? $type : "submit"  }}>
    {{ $slot }}
</button>