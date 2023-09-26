<form action="{{ $action }}" method="POST" {{ $attributes->class("") }} enctype="{{ $enctype ?? 'multipart/form-data' }}">
    @csrf
    {{ $slot }}
</form>