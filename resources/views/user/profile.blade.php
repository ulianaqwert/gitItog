@extends('layouts.nav')
@section('title', 'Профиль')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/profile.css">
@endsection
@section('content')
    <h1 class="profile__title">Профиль</h1>
    <div class="conteiner">
        <div class="profile">
            <div class="menu">
                <div class="menu__hello">
                    <h2 class="hello__hello">Здравствуй,</h2>
                    <p class="hello__name">{{ Auth::user()->name }}</p>
                </div>
                <ul class="menu__ul">
                    <li><a class="menu_a" href="{{ route('orderUser') }}"><img class="menu_image" src="/image/order.png"
                                alt=""> Мои заказы</a></li>
                    <li><a class="menu_a" href="{{ route('basket') }}"><img class="menu_image" src="/image/basket.png"
                                alt="">Корзина</a></li>
                    <li><a class="menu_a" href="{{ route('favourite') }}"><img class="menu_image" src="/image/fav.png"
                                alt="">Избранное</a></li>
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="menu_a" class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img
                                    class="menu_image" src="/image/logout.png" alt="">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-info">
                <h2 class="user-info__title">Ваши данные</h2>
                <form action="{{ url('/updateUserInfo') }}/{{ auth()->user()->id }}" method="POST"
                    class="ajax_updateUserInfo" data-id="{{ auth()->user()->id }}">
                    @csrf
                    <input type="text" name="name" value="{{ auth()->user()->name }}">
                    @error('name')
                        <p class="errorProfile">{{ $message }}</p>
                    @enderror
                    <input type="text" name="phone" value="{{ auth()->user()->phone }}">
                    @error('phone')
                        <p class="errorProfile">{{ $message }}</p>
                    @enderror
                    <div class="updateUserInfo__window">Данные обновлены</div>
                    <div class="updateUserInfo__window-error">Заполните все данные</div>
                    <button type="submit" class="updateUserInfo">Изменить и сохранить</button>
                </form>

            </div>
        </div>

    </div>
@endsection
