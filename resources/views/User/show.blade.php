<x-layout>
    <x-layouts.main>
    <div class="userShow">

            <header class="userShow__header">
                @if (auth()->user()->id == $user->id)
                    <div style="display: flex; justify-content: space-between; position: relative; width: 100%;">
                        <div style="position: absolute; z-index: 1">
                            <x-ui.a_link href="{{ route('user.edit', $user) }}" style="padding: 1rem; width: 100px; background: #313131; color: white; border: none; outline: none; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center;">
                                Edit
                            </x-ui.a_link>
                        </div>
                        <div style="position: absolute; z-index: 1; right: 0;">
                            <form action="{{ route('auth.destroy', auth()->user()->id) }}" method="POST"
                                style="text-align: center">
                                @csrf
                                @method('DELETE')
                                <button style="padding: 1rem; width: 100px; background: #313131; color: white; border: none; outline: none; border-radius: 0.5rem;">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else 
                    @if ($following)
                        <form action="/user/{{ $user->username }}/unfollow" method="POST">
                            @csrf
                            <button>
                                Unfollow 
                            </button>
                        </form>
                    @else
                        <form action="/user/{{ $user->username }}/follow" method="POST">
                            @csrf
                            <button>
                                Follow 
                            </button>
                        </form>
                    @endif
                @endif
                <div class="userShow__header__div" style="margin-bottom: 0.4rem;">
                    <img src="{{ $user->avatar }}" class="userShow__header__div__img"/>
                </div>
                <div>
                    <h3 style="text-align: center">
                        {{ $user->username }}
                    </h3>
                </div>
            </header>

            <nav class="userShow__nav">
                <div class="userShow__nav__div">
                    <ul class="userShow__nav__div__ul">
                        <div>
                            <button class="userShow__nav__div__ul__div__button">
                                Details
                            </button>
                        </div>
                    </ul>
                    <div class="userShow__nav__div__div">
                        <div>
                            Followers 
                        </div>
                        <div>
                            Following
                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </x-layouts.main>
</x-layout>