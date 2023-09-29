<x-layout>
    <x-layouts.main>
        <div class="userShow">

            <header class="userShow__header">
                @if (auth()->user()->id == $user->id)
                    <div style="display: flex; justify-content: space-between; position: relative; width: 100%;">
                        <div style="position: absolute; z-index: 1">
                            <x-ui.a_button href="{{ route('user.edit', $user) }}">
                                Edit
                            </x-ui.a_button>
                        </div>
                        <div style="position: absolute; z-index: 1; right: 0;">
                            <form action="{{ route('auth.destroy', auth()->user()->id) }}" method="POST"
                                style="text-align: center">
                                @csrf
                                @method('DELETE')
                                <x-ui.button type="submit" style="background: #313131; color: white;">
                                    Logout
                                </x-ui.button>
                            </form>
                        </div>
                    </div>
                @else 
                    @if ($currentlyFollow)
                        <form action="/user/{{ $user->username }}/unfollow" method="POST">
                            @csrf
                            <x-ui.button type="submit" style="background: #313131; color: white;">
                                Unfollow 
                            </x-ui.button>
                        </form>
                    @else
                        <form action="/user/{{ $user->username }}/follow" method="POST">
                            @csrf
                            <x-ui.button type="submit" style="background: #313131; color: white;">
                                Follow 
                            </x-ui.button>
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

            <x-user.nav :user="$user" :follows="$follows" :following="$following">
                @if(Request::segment(3) == 'followers')
                    <!-- Slot content for the 'Followers' tab goes here -->
                    <div>
                        This is the 'Followers' tab content.
                    </div>
                @elseif(Request::segment(3) == 'following')
                    <!-- Slot content for the 'Following' tab goes here -->
                    <div>
                        This is the 'Following' tab content.
                    </div>
                @endif
            </x-user.nav>

        </div>
    </x-layouts.main>
</x-layout>
