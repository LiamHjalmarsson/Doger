<x-layout>
    <x-layouts.main style="height: 85vh">

        <div class="authCreate">
            <header>
                <div>
                </div>
                <div class="userCreate__header__div">
                    Create your Doger account now 
                </div>
            </header>

            <main class="userCreate__main">
                <x-ui.form action="{{ route('user.store') }}" class="userCreate__main__form" enctype="multipart/form-data">
                    @csrf
                    <x-ui.input name="username" type="text" />
                    <x-ui.input name="email" type="email" />
                    <x-ui.input name="password" type="password" />
                    <x-ui.input name="avatar" type="file" />

                    <div class="userCreate__main__form_div">
                        <div class="userCreate__main__form_div__div">
                            <button class="userCreate__main__form_div__div__button">
                                Create account
                            </button>
                        </div>
                    </div>
                </x-ui.form>
            </main>
        </div>

        <div class="authCreate authCreate__card">
            <div class="userCreate__card__div">
                Login to your account  
            </div>
            <div class="userCreate__card__div">
                <x-ui.a_link href="{{ route('auth.create') }}" class="userCreate__card__div__a_link">
                    Login 
                </x-ui.a_link>
            </div>
        </div>

    </x-layouts.main>
</x-layout>