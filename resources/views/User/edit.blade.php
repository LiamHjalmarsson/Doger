<x-layout>
    <x-layouts.main>
        <x-cards.card class="userShow__card">

            <header class="userShow__header">
                @if (auth()->user()->id == $user->id)
                    <div style="display: flex; justify-content: space-between; position: absolute; top: 10px; width: 95%; z-index: 1;s">
                        <div>
                            <x-ui.a_link href="{{ route('user.show', $user) }}" style="padding: 1rem; width: 100px; background: #313131; color: white; border: none; outline: none; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center;">
                                User
                            </x-ui.a_link>
                        </div>
                        <div>
                            <form action="{{ route('auth.destroy', auth()->user()->id) }}" method="POST" style="text-align: center">
                                @csrf
                                @method('DELETE')
                                <button style="padding: 1rem; width: 100px; background: #313131; color: white; border: none; outline: none; border-radius: 0.5rem; cursor: pointer;">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
                <div class="userShow__header__div">
                    <x-ui.form action="{{ route('user.avatarUpdate', $user) }}" style="position: relative; padding: 1rem;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div style="position: absolute; left: 55%; top: 10px;">  
                            <x-ui.input name="avatar" type="file" style="display: none;"/>
                            <label for="avatar">
                                <img src="/settings.png" style="height: 40px; width: 40px; border-radius: 50%; background-color: #313131; padding: 0.2rem; z-index: 2;"/>
                            </label>
                        </div>
                        <img src="{{ $user->avatar }}" class="userShow__header__div__img" style="margin-bottom: 0.4rem;"/>
                        <div style="display: flex; justify-content: center;">
                            <button type="submit" id="submitButton" style="padding: 1rem; width: 100px; background: #313131; color: white; border: none; outline: none; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; display: none;">
                                Submit
                            </button>
                        </div>
                    </x-ui.form>
                </div>
                <div>
                    <h3 style="text-align: center">
                        {{ $user->username }}
                    </h3>
                </div>
            </header>

            <div style="width: 50%; margin-bottom: 4rem; border: 2px solid #313131; padding: 2rem; border-radius: 1rem; background-color: #313131; color: white;">
                <x-ui.form action="{{ route('user.update', $user) }}" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                    @csrf
                    @method('PUT')

                    <x-ui.input name="username" type="text" value="{{$user->username}}"/>
                    <x-ui.input name="email" type="email" value="{{$user->email}}"/>

                    <div style="display: flex; justify-content: space-around; grid-column: span 2;">
                            <button type="submit" class="userShow__nav__div__ul__div__button">
                                Update
                            </button>
                    </div>
                </x-ui.form>
            </div>

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

        </x-cards.card>
    </x-layouts.main>
</x-layout>


<script>
    const avatarInput = document.getElementById('avatar');
    const submitButton = document.getElementById('submitButton');

    avatarInput.addEventListener('change', function () {
        if (avatarInput.files.length > 0) {
            submitButton.style.display = 'flex';
        } else {
            submitButton.style.display = 'none';
        }
    });
</script>