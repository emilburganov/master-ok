@php use Illuminate\Support\Facades\Auth; @endphp

<header>
    <div class="header__container">
        <a class="logo" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo_ok.png') }}" alt="logo">
        </a>

        @if(Auth::user())
            @if(Auth::user()->role_id === 1)
                <div class="flex ac g-20">
                    <a class="link" href="{{ route('categories.index') }}">Список категорий</a>
                    <a class="link" href="{{ route('categories.create') }}">Создать категорию</a>
                </div>
            @endif

                @if(Auth::user()->role_id === 2)
                    <div class="flex ac g-20">
                        <a class="link" href="{{ route('applications.index') }}">Личный кабинет</a>
                        <a class="link" href="{{ route('applications.create') }}">Создать заявку</a>
                    </div>
                @endif
        @endif

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
