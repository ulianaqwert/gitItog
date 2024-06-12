@extends('layouts.nav')
@section('title', 'Товары в заказе')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/profile.css">
@endsection
@section('content')
    <h1 class="profile__title">
        Товары в заказе № {{ $products[0]->order_id }}</h1>
    <div class="basket">
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
        </div>
        <div class="productInBasket__div">
            <div class="productInBasket__priceAndOrder" id="productInBasket__priceAndOrder">
                <h2 class="productInBasket__sum"> Сумма заказа: <span id="productInBasket__sum"> {{ $price[0]->sum }}</span>
                    руб</h2>
            </div>
            <div class="productInBasket__product">
                @foreach ($products as $product)
                    <div class="productInBasket productInOrder-block" id="productInBasket-{{ $product->id }}">
                        <a href="{{ route('productCatalog', ['id' => $product->id]) }}">
                        <div class="productInBasket__image"> <div class="productInBasket__img" style="background-image: url({{ $product->photo }})">
                            {{-- <img class="productInBasket__img" src="{{ $product->photo }}" --}}
                            {{-- alt="img"> --}}
                        </div></div></a>
                        <div class="productInBasket__info productInOrder">
                            <a href="{{ route('productCatalog', ['id' => $product->id]) }}">
                                <p class="productInBasket__name productInOrder__name">{{ $product->name }}</p>
                            </a>
                            <p>Кол-во: {{ $product->count }}</p>
                            <p class="productInBasket__price productInOrderPrice">Цена за шт: {{ $product->price }} руб</p>
                            <p>Итого: {{ $product->count * $product->price }} руб</p>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


    </div>

@endsection
