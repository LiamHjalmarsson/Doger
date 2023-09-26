<x-layout>
    <div>

    </div>
    <x-cards.card style="justify-content: flex-start; align-items: center; gap: 2rem;">

        @foreach ($users as $user)
            <x-ui.a_link href="{{ route('user.show', $user) }}" class="userShow__header" style="flex-direction: row; margin: 0; margin-top: 2rem;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    {{ $user->username }}
                </div>
                <div style="display: flex; align-items: center; gap: 1rem; flex-grow: 1; justify-content: end;">
                    <div>
                        Follow
                    </div>
                    <img src="{{ $user->avatar }}" alt="" style="width: 100px;">
                </div>
            </x-ui.a_link>
        @endforeach

    </x-cards.card>
</x-layout>
