<x-layout>
    <x-cards.card style="justify-content: flex-start; align-items: center; gap: 2rem;">

        @foreach ($users as $user)
            <x-ui.a_link href="{{ route('user.show', $user) }}" style="width: 50%; background-color: orange; padding: 1rem; display: flex; justify-content: space-between; align-items: center; border-radius: 1rem;">
                <div>
                    {{ $user->username }}
                </div>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div>
                        Follow
                    </div>
                    <img src="{{ $user->avatar }}" alt="" style="width: 100px;">
                </div>
            </x-ui.a_link>
        @endforeach

    </x-cards.card>
</x-layout>
