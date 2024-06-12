@extends('layouts.nav')
@section('title', 'Избранное')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/profile.css">
@endsection
@section('content')
    <h1 class="profile__title">Избранное</h1>
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
                {{-- @if (!empty($productsInBasket))
                <h2 class="productInBasket__sum" > Сумма корзины: <span id="productInBasket__sum"> {{$price[0]->sum}}</span> руб</h2>
                <a href="{{route('makingOrder')}}"><button class="productInBasket__order">Оформить заказ</button></a>
            </div>
            @else
                <div id="emptyBasket">
                    <h2>В корзине пока пусто</h2>
                    <p>Загляните на главную, чтобы выбрать товары или найдите нужное в каталоге</p>
                </div>
            @endif --}}
                {{-- <div style="display: none;" id="emptyBasket">
                <h2>В корзине пока пусто</h2>
                <p>Загляните на главную, чтобы выбрать товары или найдите нужное в каталоге</p>
            </div> --}}
                <div class="productInBasket__product">
                    {{-- <p>ljfasfpaosfj</p> --}}
                    @if (empty($favourites))
                        <div class="emptyBasket">
                            <h2>В избранном пока пусто</h2>
                            <p>Загляните на главную, чтобы выбрать товары или найдите нужное в каталоге</p>
                            <img src="/image/art.png" alt="img" width="350px">
                        </div>
                    @endif
                    <div style="display: none;" id="emptyBasket">
                        <h2>В избранном пока пусто</h2>
                        <p>Загляните на главную, чтобы выбрать товары или найдите нужное в каталоге</p>
                        <img src="/image/art.png" alt="img" width="350px">
                    </div>
                    @foreach ($favourites as $product)
                        {{-- <h1>aasfasf</h1> --}}
                        <div class="productInBasket productInFav" id="productInBasket-{{ $product->id }}">
                            @if ($product->countProduct == 0)
                                <div class="countZeroBlock">
                                    <p>Товар закончился</p>
                                    <form action="{{ url('/deleteFromFav') }}/{{ $product->id }}" method="POST"
                                        class="ajax_deleteFromFav" data-id="{{ $product->id }}">
                                        @csrf
                                        <button type="submit" class="delete__basket">Удалить из избранного</button>
                                    </form>
                                </div>
                            @endif
                            <a href="{{ route('productCatalog', ['id' => $product->id]) }}">
                                {{-- <div class="productInBasket__image"><img class="productInBasket__img" src="{{$product->photo}}" alt="img"></div></a>
             --}}
                                <div class="productInBasket__img" style="background-image: url({{ $product->photo }})">
                                    {{-- <img class="productInBasket__img" src="{{ $product->photo }}" --}}
                                    {{-- alt="img"> --}}
                                </div>
                                <div class="productInBasket__info">
                                    <div class="info">
                                        <a href="{{ route('productCatalog', ['id' => $product->id]) }}">
                                            <p class="productInBasket__name">{{ $product->name }}</p>
                                        </a>
                                        <p class="productInBasket__price">Цена за шт: {{ $product->price }} руб</p>
                                        <div class="productInBasket__count">
                                        </div>
                                    </div>
                                    <div class="productInBasket__btn">

                                        @if (in_array($product->id, $baskets))
                                            <button type="submit" class="addInBasketFromFav">Добавлено в
                                                корзину</button>
                                        @else
                                            <form action="{{ url('/add') }}/{{ $product->id }}" method="POST"
                                                class="ajax_add" id="ajax_add-{{ $product->id }}"
                                                data-id="{{ $product->id }}">
                                                @csrf
                                                <button type="submit" class="addInBasketFromFav">Добавить в
                                                    корзину</button>
                                            </form>
                                            <form style="display: none;" action="" method="POST"
                                                class="addInBasketFromFav-{{ $product->id }}"
                                                data-id="{{ $product->id }}">
                                                @csrf
                                                <button type="submit" class="addInBasketFromFav">Добавлено в
                                                    корзину</button>
                                            </form>
                                        @endif


                                        <form action="{{ url('/deleteFromFav') }}/{{ $product->id }}" method="POST"
                                            class="ajax_deleteFromFav" data-id="{{ $product->id }}">
                                            @csrf
                                            <button type="submit" class="delete__basket">Удалить из избранного</button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    @endsection
