<nav {{ $attributes->class("userShow__nav") }}>
    <div class="userShow__nav__div">
        <ul class="userShow__nav__div__ul">
            <div>
                <x-ui.button type="click" class="userShow__nav__div__ul__div__button">
                    Details
                </x-ui.button>
            </div>
        </ul>
        <div class="userShow__nav__div__div">
            <div>
                <a href="{{ route('user.followers', $user) }}" class="{{ Request::segment(3) == "followers" ? "active" : "unactive" }}">
                    Followers: {{ $follows }}
                </a>
            </div>
            <div>
                <a href="{{ route('user.following', $user) }}" class="{{ Request::segment(3) == "following" ? "active" : "unactive" }}">
                    Following: {{ $following }}
                </a> 
            </div>
        </div>
    </div>
</nav>