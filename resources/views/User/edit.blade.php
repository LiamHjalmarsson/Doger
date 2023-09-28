<x-layout>
    <x-layouts.main>
        <div class="userShow">

            <header class="userShow__header">
                @if (auth()->user()->id == $user->id)
                    <div style="display: flex; justify-content: space-between; position: relative; width: 100%;">
                        <div style="position: absolute; z-index: 1">
                            <x-ui.a_button href="{{ route('user.show', $user) }}">
                                User
                            </x-ui.a_button>
                        </div>
                        <div style="position: absolute; right: 0; z-index: 1;">
                            <form action="{{ route('auth.destroy', auth()->user()->id) }}" method="POST" style="text-align: center">
                                @csrf
                                @method('DELETE')
                                <x-ui.button type="submit" style="background: #313131; color: white;">
                                    Logout
                                </x-ui.button>
                            </form>
                        </div>
                    </div>
                @endif
                <div class="userShow__header__div">
                    <x-ui.form action="{{ route('user.avatarUpdate', $user) }}" style="position: relative;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div style="position: absolute; left: 55%; top: 10px;">  
                            <x-ui.input name="avatar" type="file" style="display: none;"/>
                            <label for="avatar">
                                <img src="/settings.png" style="height: 40px; width: 40px; border-radius: 50%; background-color: #313131; padding: 0.2rem; z-index: 2;"/>
                            </label>
                        </div>
                        <img src="{{ $user->avatar }}" class="userShow__header__div__img" style="margin-bottom: 0.4rem; "/>
                        <div style="display: flex; justify-content: center;">
                            <x-ui.button type="submit" id="submitButton" style="background: #313131; color: white; justify-content: center;">
                                Submit
                            </x-ui.button>
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
                    
                    <x-ui.input name="username" type="text"/>
                    <x-ui.input name="email" type="email"/>

                    <div style="display: flex; justify-content: space-around; grid-column: span 2;">
                            <x-ui.button type="click" style="background-color: #FBAB7E; background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);">
                                Update
                            </x-ui.button>
                    </div>
                </x-ui.form>
            </div>

            <nav class="userShow__nav">
                <div class="userShow__nav__div">
                    <ul class="userShow__nav__div__ul">
                        <div>
                            <x-ui.button type="click" style="background-color: #FBAB7E; background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);">
                                Posts
                            </x-ui.button >
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