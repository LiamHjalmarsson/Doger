    <div class="notification-container">
        @if (session()->has('success'))
            <div class="notification">
                {{ session('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="notification error">
                {{ session('error') }}
            </div>
        @endif
    </div>