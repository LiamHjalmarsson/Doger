<nav {{ $attributes->class("nav") }}>
    <div>
        Doger
    </div>
    <ul class="nav__ul">
        <li>
            <x-ui.a_link href="{{ route('user.index') }}">
                All Users
            </x-ui.a_link>
        </li>
    </ul>
    <div>
        @auth
            <x-ui.a_link href="{{ route('user.show', auth()->user()) }}">
                {{ auth()->user()->username }}   
            </x-ui.a_link>
        @else 
            <x-ui.a_link href="{{ route('auth.create') }}">
                Login
            </x-ui.a_link>
        @endauth 
    </div>
</nav>