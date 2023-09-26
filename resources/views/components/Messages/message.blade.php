<div style="position: absolute; top: 12%; left: 50%; transform: translate(-50%, -50%); width: 60%;">
    @if (session()->has('success'))
        <div style="margin: auto; width: 50%; text-align: center; padding: 1rem; background-color: #313131; color: white; border-radius: 0.5rem;">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div style="margin: auto; width: 50%; text-align: center; padding: 1rem; background-color: #313131; color: white; border-radius: 0.5rem;">
            {{ session('error') }}
        </div>
    @endif
</div>