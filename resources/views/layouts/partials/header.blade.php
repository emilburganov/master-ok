<header>
    <div class="header__container">
        <a class="logo" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo_ok.png') }}" alt="logo">
        </a>
        <div class="flex ac g-10">
        </div>
        @guest
            <div class="flex ac g-20">
                <a class="button" href="{{ route('login.get') }}">Логин</a>
                <a class="button" href="{{ route('registration.get') }}">Регистрация</a>
            </div>
        @endguest
        @auth
            <div class="flex ac g-20">
                <a class="button" href="{{ route('logout') }}">Выйти</a>
            </div>
        @endauth
    </div>
</header>
