<x-layout>
    <x-layouts.main style="height: 85vh">

        <x-cards.card >
            <header>
                <div>
                </div>
                <div class="authCreate__header__div">
                    Login to Doger 
                </div>
            </header>

            <main class="authCreate__main">
                <x-ui.form action="{{ route('auth.store') }}" class="authCreate__main__form">
                    <x-ui.input name="username" type="text" />
                    <x-ui.input name="password" type="password" />

                    <div class="authCreate__main__form_div">
                        <div class="authCreate__main__form_div__div">
                            <h3 class="authCreate__main__form_div__div__h3">
                                Forgout password
                            </h3>
                        </div>
                    </div>

                    <div class="authCreate__main__form_div">
                        <div class="authCreate__main__form_div__div">
                            <button class="authCreate__main__form_div__div__button">
                                Login
                            </button>
                        </div>
                    </div>
                </x-ui.form>
            </main>
        </x-cards.card>

        <x-cards.card class="authCreate__card">
            <div class="authCreate__card__div">
                Create your account today!   
            </div>
            <div class="authCreate__card__div">
                <x-ui.a_link href="{{ route('user.create') }}" class="authCreate__card__div__a_link">
                    Sign up!
                </x-ui.a_link>
            </div>
        </x-cards.card>
        
    </x-layouts.main>
</x-layout>