<x-layout>
    <x-layouts.main style="height: 85vh">
        <div class="authCreate">
            <header>
                <div>
                </div>
                <div class="authCreate__header__div">
                    Login to Doger 
                </div>
            </header>

            <div class="authCreate__main">
                <x-ui.form action="{{ route('auth.store') }}" class="authCreate__main__form">
                    <x-ui.input name="username" />
                    <x-ui.input name="password" type="password" />

                    <div class="authCreate__main__form_div" style="margin-bottom: 2rem ">
                        <div class="authCreate__main__form__div__div">
                            <a href="#" style="color: black; text-decoration: underline;">
                                Forgout password
                            </a>
                        </div>
                    </div>

                    <div class="authCreate__main__form_div">
                        <div class="authCreate__main__form__div__div">
                            <x-ui.button class="authCreate__main__form_div__div__button">
                                Login
                            </x-ui.button>
                        </div>
                    </div>
                </x-ui.form>
            </div>
        </div>

        <div class="authCreate authCreate__card">
            <div class="authCreate__card__div"> 
                Create your account today!   
            </div>
            <div class="authCreate__card__div">
                <x-ui.a_link href="{{ route('user.create') }}" class="authCreate__card__div__a_link">
                    Sign up!
                </x-ui.a_link>
            </div>
        </div>
        
    </x-layouts.main>
</x-layout>